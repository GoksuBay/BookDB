<?php session_start();
require_once '../includes/dbconnect.php'; 
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");?>

<?php 
$ISBN=intval($_GET['ISBN']);

$bookListSql= "SELECT * FROM book WHERE ISBN='$ISBN'";
$bookListResult=mysqli_query($connect,$bookListSql);
$pullData=mysqli_fetch_assoc($bookListResult); //Selects book using the ISBN.
$authorID=$pullData['authorID'];
$categoryID=$pullData['categoryID'];


$bookAuthorSql="SELECT name FROM author WHERE id='$authorID' ";
$bookAuthorResult=mysqli_query($connect,$bookAuthorSql);
$pullAuthorData=mysqli_fetch_assoc($bookAuthorResult); //Selects author using the authorID.

$bookCategorySql="SELECT categoryName FROM category WHERE id='$categoryID'";
$bookCategoryResult=mysqli_query($connect,$bookCategorySql);
$pullCategoryData=mysqli_fetch_assoc($bookCategoryResult);

if(isset($_POST['submit']))
{
	$ISBND = $_POST['ISBN'];
	$summary = $_POST['summary'];
	$name = $_POST['name'];

	$sql = "UPDATE book SET ISBN = '$ISBND', summary= '$summary', name= '$name' WHERE ISBN='$ISBN'";
	mysqli_query($connect, $sql);
}

?>

<html>
<head>
	<title>Book Info</title>
	<link rel="stylesheet" type="text/css" href="bookInfo.css">
	<meta charset="utf-8">
	
</head>

<body>
</br>	
<img src="<?php echo "../Admin/".$pullData['image']; ?>"></img>


<h1> Summary <br>  </h1>       

<h2>
	<ul>
		<!-- List for book informations  -->
		<div><a href="">              <li> Author:<?php echo $pullAuthorData['name']; ?> </li>         </a></div><br>
		
		<div><li> Score:   <?php echo $pullData['score']; ?></li></div><br>
		<div><li> Category: <?php echo $pullCategoryData['categoryName']; ?>  </li></div><br>
		<div><li> Release Date:  <?php echo $pullData['releaseDate']; ?></li></div><br>
		

		<form enctype="multipart/form-data" action="bookInfo.php?ISBN=<?php echo $ISBN?>" method="post">
		<li> Name: <input type="text" name="name" value= <?php echo $pullData['name']?> required></li><br>
		<li> ISBN: <input type="number" value= "<?php echo $pullData['ISBN']?>" name="ISBN"> </li><br>
		<li> Summary: <br><br><textarea rows="4" cols="50" name ="summary" required placeholder="Summary"> <?php echo $pullData['summary']?></textarea> </li><br>
			<input type="submit" name="submit" value = "Submit">
                        
        </form>

	</h2>
</ul>
</body>


</html>