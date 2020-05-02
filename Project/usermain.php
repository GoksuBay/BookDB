<?php require  "includes/dbconnect.php"

$sql = 'SELECT photos, categoryName FROM category'; 
$result = mysqli_query($connect, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
	<input type="text" name="lookfor" placeholder="Enter what do you look for about..." size="100" />
	<input type="submit" name="search" value="Search"/></form>
	<br><br>
	<form>
		<fieldset>
		<legend><b> Categories </b></legend>
		<ul>
			<?php 

			print_r($categories);
				
			?>
			<!--<a href=""><li> Science Fiction</li></a>
			<a href=""><li> Biography </li></a>
			<a href=""><li> Comic Books </li></a>
			<a href=""><li> Romantic </li></a>
			<a href=""><li> Classics </li></a>
			<a href=""><li> Political </li></a>
			<a href=""><li> Kid </li></a>
			<a href=""><li> Action/Adventure </li></a>
			<a href=""><li> Whodunit </li></a>
			<a href=""><li> Others </li></a> -->
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
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User1 User </h5><h6> OPS: 99 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User2 User </h5><h6> OPS: 88 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User3 User </h5><h6> OPS: 77 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User4 User </h5><h6> OPS: 66 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User5 User </h5><h6> OPS: 55 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User6 User </h5><h6> OPS: 44 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User7 User </h5><h6> OPS: 33 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User8 User </h5><h6> OPS: 22 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User9 User </h5><h6> OPS: 11 </h6>
			<br>
			<img src="" width="30px" height="30px" border="2" bordercolor ="orange">
			<h5>User10 User </h5><h6> OPS: 00 </h6>
			<br>
		</fieldset>
	</form>


</body>
</html>