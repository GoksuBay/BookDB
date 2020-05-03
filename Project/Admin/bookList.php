<!DOCTYPE html>
<html>
<head>
	<hr>
	<h1>User List: </h1>
	<hr>

	<title>User list</title>
</head>

<?php 
session_start();
require '../includes/dbconnect.php';
if(isset($_SESSION['adminid']) != NULL)
    header("Location: ../noPermission.php");;

if(isset($_POST["delete"]))
{
	$ISBN = intval($_GET['ISBN']);
	$query = "DELETE FROM book WHERE ISBN = '$ISBN'";
	mysqli_query($connect, $query);
}

$result = mysqli_query($connect, "SELECT * FROM book");
while($rows = mysqli_fetch_assoc($result))
{
     $books = $rows['name'];    
 	?>

 	<body>
		 <a <?php echo $rows['ISBN'] ?> > <?php print_r($rows['name']); ?></a>
		 <form action="bookList.php?ISBN=<?php echo $rows['ISBN']?>" method="post">
		 <input type="submit" value="Delete" name="delete">
		 </form>
		 <input type="button" value="More Info" name="moreInfo" onclick="location.href='bookInfo.php?ISBN=<?php echo $rows['ISBN']?>';">
		 <hr>
 	</body>



 <?php } ?>
 



 </html>