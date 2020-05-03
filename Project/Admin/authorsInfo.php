<?php
session_start();

require "../includes/dbconnect.php";
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");
    
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

.books{
    padding-left: 60px;
}

</style>
<nav>
<img src=  "<?php echo '../Admin/'  .$rows['photo'];  ?> " > </img>


<p>Score :</p>
<?php 
echo $rows['score'];
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
?>

</article>

<h3>All Books</h3>
<?php

$result1=mysqli_query($connect,"SELECT * FROM book WHERE authorID='$id'");
while($rows1=mysqli_fetch_assoc($result1)){


?>
<footer>
<a href = "../Bookoperations/bookInfo.php?ISBN=<?php echo $rows1['ISBN']?>" > <?php echo $rows1['name']; } ?> </a>

</footer>

</body>
</html>

