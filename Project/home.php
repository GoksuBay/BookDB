<?php require  "includes/dbconnect.php";

$categorysql = "SELECT * FROM category"; 
$booksql = "SELECT * FROM book ORDER BY score";
$usersql = "SELECT * FROM users ORDER BY score DESC";
$resultcategory = mysqli_query($connect, $categorysql);
$resultusers = mysqli_query($connect, $usersql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<meta charset="utf-8">
</head>
<body>
<img src="" width="2000px" height=" 700px" align="right">
<br><br>
<div align="right">
	<img src="" width="100px" height="100px" border="3" bordercolor ="black">
	<h3> Name Surname </h3> <h5> OPS : 33 </h5>
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
			<a href ="Categories/categories1.php?id=<?php echo $categories['id']?>"><li><li style="list-style-type: none"><?php print_r($categories['categoryName']); } ?></li> </li></a>
			
		</ul>
	</fieldset><br>
	<fieldset>
		<legend><b>The Most Popular...</b></legend>
		<ul>
			<a href=""><li> Books </li></a>
			<a href=""><li> Writers </li></a>
		</ul>
	</fieldset><br>
	<fieldset><a href=""> Last Added Books </a></fieldset>
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
			<img src="<?php echo 'Admin/'.$users['photo'] ?>" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User: <?php print_r($users['username']) ?> </h5><h6> <?php print_r($users['score']); } ?> </h6>
			<br>
			
		</fieldset>
	</form>


</body>
</html>