<!DOCTYPE html>
<html>
<head>
	<hr>
	<h1>User List: </h1>
	<hr>

	<title>User list</title>
</head>

<?php 
require '../includes/dbconnect.php';

$result = mysqli_query($connect, "SELECT * FROM users");
while($rows = mysqli_fetch_assoc($result))
{
     $books = $rows['username'];    
 	?>

 	<body>
		 <a <?php echo $rows['id'] ?> > <?php print_r($rows['username']); ?></a>
		 <input type="button" value="Ban" name="Ban" onclick="location.href='author.php';">
		 <input type="button" value="More Info" name="moreInfo" onclick="location.href='userInfo.php?id=<?php echo $rows['id']?>';">
 		<hr>
 	</body>



 <?php } ?>
 



 </html>