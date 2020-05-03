<?php
session_start(); ?>
<!DOCTYPE html
<head> 
  <header>Categories</header>
  <title>Categories</title>

</head>
<?php
require "../includes/dbconnect.php";

$categoriesSql="SELECT * FROM category";
$categoriesResult=mysqli_query($connect,$categoriesSql);
while($pullCate=mysqli_fetch_assoc($categoriesResult)){
  echo '<div class="box">';
  ?>   
  <li style="list-style-type:none">
  <img src=  "<?php echo '../Admin/'  .$pullCate['photo'];  ?> " style="width:200px;height:200px;"> </img> 

<a href ="categoryInfo.php?id=<?php echo $pullCate['id']?>"  > <li style="list-style-type: none"><p style="font-family: monospace"><?php print_r($pullCate['categoryName']);  ?></p></li> 
</li> 
<?php echo '</div>'; } ?>

<body style="background-color:lavender">
<style >
h1{color: #ff6600;
   font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
   border-radius: 10px;
   behavior:url(border-radius.htc);
}
.box {
margin-top: 30px;
margin-left: 29px;
margin-right: 29px;
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
</body>
</html>




 









</body>


</html>
