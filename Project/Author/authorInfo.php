<?php
session_start();

require "../includes/dbconnect.php";

$id = intval($_GET['id']);
$result=mysqli_query($connect,"SELECT * FROM author WHERE id='$id'");
$rows=mysqli_fetch_assoc($result);
  
    ?>
<header>
    <?php 
echo $rows['name'];
    ?>
</header>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Author1</title>
<meta charset="utf-8">


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

nav{
float: left;
padding: 20px;
text-align: center;
font-size: 20px;
width:300px;
height:400px;
}

article{
float: right;
padding: 20px;
padding-top: 30px;
text-align: left;
font-size: 18px;
width:950px;
height:400px;


}

ul{
    padding-left: 10px;
}



</style>
<nav>
<img src=  "<?php echo '../Admin/'  .$rows['photo'];  ?> " style="width:200px;height:200px;"> </img>



<?php 

$query="SELECT AVG(score) FROM book WHERE authorID='$id'";
$result=mysqli_query($connect,$query) or die(mysqli_error('error'));
while($row3=mysqli_fetch_array($result)){
$score= $row3['AVG(score)'];
?>
<p>Score: <?php echo $score; ?></p>
<?php
}
$query2="INSERT INTO author(score) VALUES '$score' WHERE id='$id'";
mysqli_query($connect,$query2);

?>
 


<p>Date Of Birth:</p>
<?php 
echo $rows['dateofBirth'];
?>

</nav>

<article>
<h3>About</h3>
<?php 
echo $rows['about'];
$result=mysqli_query($connect,"SELECT COUNT(*) AS count FROM book WHERE authorID='$id'");
$counter=mysqli_fetch_assoc($result);

?>

</article>

<h3>All Books (<?php  echo $counter['count']; ?>) </h3>
<?php

$result1=mysqli_query($connect,"SELECT * FROM book WHERE authorID='$id'");
while($rows1=mysqli_fetch_assoc($result1)){
  


?>
<footer>
<ul><img src=  "<?php echo '../Admin/'  .$rows1['image'];  ?> " style="width:75px;height:100px;"> </img> </ul>
<li style="list-style-type: none"><a href = "../Bookoperations/bookInfo.php?ISBN=<?php echo $rows1['ISBN']?>" > <?php echo $rows1['name'];  } ?> </a></li>

</footer>

</body>
</html>

