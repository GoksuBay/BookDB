<?php  session_start(); 
require_once '../includes/dbconnect.php';?>
<!DOCTYPE html>
<html>
<head>
	<header>Book List</header>

	<title>Book List</title>
</head>

<?php 


$bookListSql= "SELECT * FROM book";
$bookListResult=mysqli_query($connect,$bookListSql);

 while($pullData=mysqli_fetch_assoc($bookListResult)){ // lists books from database [array]
	echo '<div class="box">';
 	?>

 	<body style="background-color: lavender">  
		 <li style="list-style-type: none">
		 <img src=  "<?php echo '../Admin/'  .$pullData['image'];  ?> " style="width:150px;height:200px;"> </img> </li>
		 <li style="list-style-type: none"><a href="bookInfo.php?ISBN=<?php echo $pullData['ISBN'] ?> "><p style="font-family: monospace"> <?php print_r($pullData['name']); ?> </p> </a></li> <?php //prints books as a link ?>
		 <?php echo '</div>'; } ?>
		 <style>

header{
padding: 20px;
background-color:slateblue;
text-align: center;
font-family:monospace;
font-size: 25px;
color: black;
} 
.box {
margin-top: 30px;
margin-left: 35px;
margin-right: 35px;
padding-block: 25px;
float: left;
height: auto;
}



		 </style>


 	</body>



 



 </html>