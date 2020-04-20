<!DOCTYPE html>
<html>
<head>
	<hr>
	<h1>Book List: </h1>
	<hr>

	<title>Book list</title>
</head>

<?php 
require_once 'connect.php';

$dbQuery=$db->prepare("SELECT * FROM book"); // selects the book table 
 $dbQuery->execute(); //executes the queys
 while($pullData=$dbQuery->fetch(PDO:: FETCH_ASSOC)){ // lists books from database [array]

 	?>

 	<body> 
 		<a href="bookInfo.php?id=<?php echo $pullData['id'] ?> "> <?php print_r($pullData['bookName']); ?>  </a> <?php //prints books as a link ?>
 		<hr>
 	</body>



 <?php } ?>
 



 </html>