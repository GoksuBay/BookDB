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
	
</head>

<body>
</br>	
<img src="<?php echo "../Admin/".$pullData['image']; ?>"></img>

<hr color="black" /> 
<p><h1> Summary: <br>  </h1> </p>            
<hr color="black" />
<h1>
	<ul>
		<!-- List for book informations  -->
		<a href="">              <li> Author:<?php echo $pullAuthorData['name']; ?> </li>         </a>
		
		
		<li> Score:   <?php echo $pullData['score']; ?></li>
		<li> Category: <?php echo $pullCategoryData['categoryName']; ?>  </li>
		<li> Release Date:  <?php echo $pullData['releaseDate']; ?></li>

		<form enctype="multipart/form-data" action="bookInfo.php?ISBN=<?php echo $ISBN?>" method="post">
		<li> Name:<input type="text" name="name" value= <?php echo $pullData['name']?> required></li>
		<li> ISBN:<input type="number" value= "<?php echo $pullData['ISBN']?>" name="ISBN"> </li>
		<li> Summary<textarea rows="4" cols="50" name ="summary" required placeholder="Summary"> <?php echo $pullData['summary']?></textarea> </li>
			<input type="submit" name="submit" value = "Submit">
                        
        </form>

	</h1>
</ul>
</body>


</html>