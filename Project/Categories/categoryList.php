<?php
session_start(); ?>
<!DOCTYPE html
<head> 
  <h1 style="text-align: center">Categories</h1>
</head>
</html>
<?php
require "../includes/dbconnect.php";

$categoriesSql="SELECT * FROM category";
$categoriesResult=mysqli_query($connect,$categoriesSql);
while($pullCate=mysqli_fetch_assoc($categoriesResult)){
  ?>   
  <li style="list-style-type:none">
  <img src=  "<?php echo '../Admin/'  .$pullCate['photo'];  ?> " style="width:200px;height:200px;"> </img> 

<a href ="categoryInfo.php?id=<?php echo $pullCate['id']?>"  > <li style="list-style-type: none"><?php print_r($pullCate['categoryName']); } ?></li> 
</li> 


<!DOCTYPE html>

<head>

</head>
<body>






 









</body>


</html>
