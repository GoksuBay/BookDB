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
<title>Authors Info</title>
<link rel="stylesheet" type="text/css" href="authorsInfo.css">
<meta charset="utf-8">


</head>
<body>

<nav>
<img src=  "<?php echo '../Admin/'  .$rows['photo'];  ?> " > </img>


<p>Score: </p>
<?php 
echo $rows['score'];
?>
 


<p>Date Of Birth: </p>
<?php 
echo $rows['dateofBirth'];
?>

</nav>

<article>
<h4><u>About</u></h4>
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

