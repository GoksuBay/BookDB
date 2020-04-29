<!DOCTYPE html>
<html>
<head>
	<hr>
	<h1>Book List: </h1>
	<hr>

	<title>Book list</title>
</head>

<?php 
require_once '../includes/dbconnect.php';

$bookListSql= "SELECT * FROM book";
$bookListResult=mysqli_query($connect,$bookListSql);

 while($pullData=mysqli_fetch_assoc($bookListResult)){ // lists books from database [array]

 	?>

 	<body> 
 		<a href="bookInfo.php?ISBN=<?php echo $pullData['ISBN'] ?> "> <?php print_r($pullData['name']); ?>  </a> <?php //prints books as a link ?>
 		<hr>
 	</body>



 <?php } ?>
 



 </html>