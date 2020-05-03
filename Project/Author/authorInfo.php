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
<title> <?php echo $rows['name']; ?></title>

<meta charset="utf-8">


</head>
<body style="background-color:lavender">

<style>
header{
padding: 20px;
background-color:slateblue;
text-align: center;
font-family:monospace;
font-size: 25px;
color: black;
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
.box {
margin-top: 30px;
margin-left: 17px;
margin-right: 17px;
padding-block: 25px;
float: left;
height: auto;

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
<p style="font-family: monospace">Score: <?php echo $row3['AVG(score)']; ?></p>
<?php
}
$query2="INSERT INTO author(score) VALUES ($score) WHERE authorID='$id'";
mysqli_query($connect,$query2);

?>
 


<p style="font-family: monospace">Date Of Birth:</p>
<p style="font-family: monospace">
<?php 
echo $rows['dateofBirth'];
?>
</p>

</nav>

<article>
<h3 style="font-family:monospace">About</h3>
<p style="font-family: monospace">
<?php 
echo $rows['about'];
$result=mysqli_query($connect,"SELECT COUNT(*) AS count FROM book WHERE authorID='$id'");
$counter=mysqli_fetch_assoc($result);

?>


</article>

<h3 style="font-family: monospace">All Books (<?php  echo $counter['count']; ?>) </h3>
<?php

$result1=mysqli_query($connect,"SELECT * FROM book WHERE authorID='$id'");
while($rows1=mysqli_fetch_assoc($result1)){
    echo '<div class="box">';

?>
<footer>
<ul><img src=  "<?php echo '../Admin/'  .$rows1['image'];  ?> " style="width:75px;height:100px;"> </img> </ul>
<li style="list-style-type: none"><a href = "../Bookoperations/bookInfo.php?ISBN=<?php echo $rows1['ISBN']?>" > <p style="font-family: monospace"><?php echo $rows1['name'];   ?> </a></li></p>
<?php echo '</div>'; } ?>
</footer>

</body>
</html>

