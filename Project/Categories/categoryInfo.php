
<?php
session_start(); 
$id = intval($_GET['id']);
require "../includes/dbconnect.php";
$categoriesSql="SELECT * FROM category WHERE id='$id'";
$categoriesResult=mysqli_query($connect,$categoriesSql);
$pullCate=mysqli_fetch_assoc($categoriesResult);?>
<!DOCTYPE html
<head>
<header><?php echo $pullCate['categoryName']; ?>  </header>
<title> <?php echo $pullCate['categoryName']; ?></title>
</head>
<body style="background-color: lavender">

<style >
h1{color: #ff6600;
   font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
   border-radius: 10px;
   behavior:url(border-radius.htc);
}
.box {
margin-top: 30px;
margin-left: 20px;
margin-right: 20px;
padding-block: 25px;
float: left;
height: auto;

}
header{
padding: 20px;
background-color:slateblue;
text-align: center;
font-family:monospace;
font-size: 25px;
color: black;
} 



</style>




<?php

$id = intval($_GET['id']);
$categorysql="SELECT * FROM book WHERE categoryID='$id'";
$categoryResult=mysqli_query($connect,$categorysql);
while($pullBook=mysqli_fetch_assoc($categoryResult)){
    echo '<div class="box">';
?>

    
<li style="list-style-type: none"><img src=  "<?php echo '../Admin/'  .$pullBook['image'];  ?> " style="width:150px;height:200px;"> </img> </li>


<li style="list-style-type: none"> <a href = "../Bookoperations/bookInfo.php?ISBN=<?php echo $pullBook['ISBN']?>" ><p style="font-family: monospace"> <?php echo $pullBook['name']; ?> </a></p> </li>
<?php echo '</div>'; } ?>

<br>
</body>
</html>



