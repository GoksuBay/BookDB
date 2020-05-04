<?php
session_start(); ?>
<!DOCTYPE html
<head> 
  <h1 style="text-align: center">Categories</h1>
</head>
</html>

<!DOCTYPE html>

<form action="search.php" method="post">
<input type="text" name="search" required>
<input type="submit" name="submit" value="Search">
</form>

<?php
require "includes/dbconnect.php";

if(isset($_POST['submit']))
{
$search = $_POST['search'];
$sqlA ="SELECT * FROM author WHERE name LIKE '%$search%'";
$sqlB ="SELECT * FROM book WHERE name LIKE'%$search%'";

$resultB=mysqli_query($connect,$sqlB);
$resultA=mysqli_query($connect, $sqlA);

while($rowsB=mysqli_fetch_assoc($resultB)){
  ?>   
  <li style="list-style-type:none">
  <img src="<?php echo "Admin/".$rowsB['image']; ?>"style="width:200px;height:200px;"> </img> 

<a href ="Bookoperations/bookInfo.php?ISBN=<?php echo $rowsB['ISBN']?>"  > <li style="list-style-type: none"><?php print_r($rowsB['name']); } ?></li> 
</li> 
<?php
while($rowsA=mysqli_fetch_assoc($resultA)){
  ?>   
  <li style="list-style-type:none">
  <img src=  "<?php echo 'Admin/'  .$rowsA['photo'];  ?> " style="width:200px;height:200px;"> </img> 

<a href ="Author/authors1.php?id=<?php echo $rowsA['id']?>"  > <li style="list-style-type: none"><?php print_r($rowsA['name']); } }?></li> 
</li> 




<head>

</head>
<body>






 









</body>


</html>
