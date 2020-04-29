<?php require_once '../includes/dbconnect.php'; ?>

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


?>

<html>
<head>
	
</head>

<body>
</br>	
<img src="<?php echo "../Admin/".$pullData['image']; ?>"> <h1><?php echo $pullData['name']; ?></h1></img>

<hr color="black" /> 
<p><h1> Summary: <br> <?php echo $pullData['summary']; ?> </h1>  </p>            
<hr color="black" />
<h1>
	<ul>
		<!-- List for book informations  -->
		<a href="">              <li> Author:<?php echo $pullAuthorData['name']; ?> </li>         </a>
		<li> ISBN:<?php echo $pullData['ISBN']; ?> </li>
		
		<li> Score:   <?php echo $pullData['score']; ?></li>
		<li> Category: <?php echo $pullCategoryData['categoryName']; ?>  </li>
		<li> Release Date:  <?php echo $pullData['releaseDate']; ?></li>
		<li> Comment area: </li>

	</h1>
</ul>
</body>


</html>