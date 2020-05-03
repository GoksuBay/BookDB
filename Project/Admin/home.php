<?php 
session_start();
require  "../includes/dbconnect.php";

$categorysql = "SELECT * FROM category"; 
$booksql = "SELECT * FROM book ORDER BY score";
$usersql = "SELECT * FROM users ORDER BY score DESC";
$resultcategory = mysqli_query($connect, $categorysql);
$resultusers = mysqli_query($connect, $usersql);
$resultBooks = mysqli_query($connect, $booksql);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<meta charset="utf-8">
</head>
<body>
<?php if(isset($_SESSION['id']) == NULL)
{
?>


<br><br>
<div align="right">
<div><input type ="button" name="button" value="Login" onclick="document.location.href='login/login.php'"></div>
<div><input type ="button" name="button" value="Sign Up" onclick="document.location.href='signup/register.php'"></div> </div> <?php }
else
{
	$id=$_SESSION['id'];
	$resultLoggedin = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
	$rowLoggedin = mysqli_fetch_assoc($resultLoggedin);
	?>
	<div align="right">
	<img src="<?php echo 'Admin/'.$rowLoggedin['photo']?>" width="100px" height="100px" border="3" bordercolor ="#ff6600">
	<h3> <?php echo $rowLoggedin['username'] ?> </h3> <h5> <?php echo $rowLoggedin['score']; ?> </h5>
<input type ="button" name="button" value="Logout" onclick="document.location.href='login/logout.php'"> <?php } ?>
</div>
<hr>
<br><br>
<form action="" name="searchbox" method="post">
	<input type="button" name="search" value="Search" onclick="document.location.href='search.php'"/></form>
	<br><br>
	<form>
		<fieldset>
		<legend><b> Categories </b></legend>
		<ul>
			<?php 

for ($i=0; $i <9 ; $i++) { 
	$categories = mysqli_fetch_assoc($resultcategory);
				
			?>
			<img src="<?php echo 'Admin/'.$categories['photo']?>" width="90px" height="90px" border="2" bordercolor ="orange"><br>
			<a href ="Categories/categoryInfo.php?id=<?php echo $categories['id']?>"><li><li style="list-style-type: none"><?php print_r($categories['categoryName']); } ?></li> </li></a>
			
		</ul>
	</fieldset><br>
	<fieldset>
		<legend><b>The Most Popular Books</b></legend>
		<ul>
		<?php 

for ($i=0; $i <9 ; $i++) { 
	$books = mysqli_fetch_assoc($resultBooks);
				
			?>
			<img src="<?php echo 'Admin/'.$books['photo'] ?>" width="90px" height="90px" border="2" bordercolor ="orange">
			<a href ="Bookoperations/bookInfo.php?id=<?php echo $books['ISBN']?>"><li><li style="list-style-type: none"><?php print_r($books['name']); } ?></li> </li></a>
		</ul>
	</fieldset><br>
	<fieldset>
		<div class="all"><a href="Bookoperations/bookList.php"> All Books </a></div>
	</fieldset>
	</form>
	<br><hr><br>
	<form>
		<fieldset>
			<legend><b> The Most Popular Users </b></legend>
			<?php
				for ($i=0; $i <9 ; $i++) { 
					$users = mysqli_fetch_assoc($resultusers);
			?>
			<br>
			<img src="<?php echo 'Admin/'.$users['photo'] ?>" width="90px" height="90px" border="2" bordercolor ="orange">
			<h4>User: <?php print_r($users['username']) ?> </h4><h5> <?php print_r($users['score']); } ?> </h5>
			<br>
			
		</fieldset>
	</form>


</body>
</html>