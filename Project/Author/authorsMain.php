<?php session_start(); ?>
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

$authorlistSql="SELECT * FROM author";
$authorlistResult=mysqli_query($connect,$authorlistSql);

while($pullData=mysqli_fetch_assoc($authorlistResult)){
    ?>

    

<nav>

<ul style="list-style-type:none;">

<a href="authors1.php?id=<?php echo $pullData['id']?>"><?php  print_r($pullData['name']);?></a>
</ul>
</nav>
<?php   }  ?>