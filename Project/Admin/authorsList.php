<?php session_start(); 
if(isset($_SESSION['adminid']) == NULL)
header("Location: ../noPermission.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Author1</title>
<meta charset="utf-8">
<header>Authors</header>
</head>
<body>

<style>

header{
padding: 20px;
background-color:coral;
text-align: center;
font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
font-size: 25px;

} 


</style>

</body>
</html>
<?php


require "../includes/dbconnect.php";

if(isset($_POST["delete"]))
{
    $id = intval($_GET['id']);
    $queryBook = "DELETE FROM book WHERE authorID ='$id'";
	$queryAuthor = "DELETE FROM author WHERE id = '$id'";
    mysqli_query($connect, $queryBook);
    mysqli_query($connect, $queryAuthor);
}

$authorlistSql="SELECT * FROM author";
$authorlistResult=mysqli_query($connect,$authorlistSql);

while($pullData=mysqli_fetch_assoc($authorlistResult)){
    ?>

    

<nav>

<ul style="list-style-type:none;">

        <a <?php echo $pullData['id'] ?> > <?php print_r($pullData['name']); ?></a>
        <form action="authorsList.php?id=<?php echo $pullData['id']?>" method="post">
		 <input type="submit" value="Delete" name="delete">
		 </form>
		 <input type="button" value="More Info" name="moreInfo" onclick="location.href='authorsInfo.php?id=<?php echo $pullData['id']?>';">
</ul>
</nav>
<?php   }  ?>
</html>