<?php
session_start();
$id = intval($_GET['id']);
require "../includes/dbconnect.php";
$categoriesSql="SELECT * FROM category WHERE id='$id'";
$categoriesResult=mysqli_query($connect,$categoriesSql);
$pullCate=mysqli_fetch_assoc($categoriesResult);

?>
<!DOCTYPE html
<head>
<h1 style="text-align: center"> <?php echo $pullCate['categoryName']; ?>  </h1>
</head>
</html>
<?php

$id = intval($_GET['id']);
$categorysql="SELECT * FROM book WHERE categoryID='$id'";
$categoryResult=mysqli_query($connect,$categorysql);
while($pullBook=mysqli_fetch_assoc($categoryResult)){
?>

<li style="list-style-type: none"><img src=  "<?php echo '../Admin/'  .$pullBook['image'];  ?> " style="width:150px;height:200px;"> </img> </li>

<li style="list-style-type: none"> <a href = "../Bookoperations/bookInfo.php?ISBN=<?php echo $pullBook['ISBN']?>" > <?php echo $pullBook['name']; } ?> </a> </li>
<br>




