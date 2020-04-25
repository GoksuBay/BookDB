<?php 
try {
	$db= new PDO("mysql:host=localhost;dbname=books;charset=utf8",'root','beratfb443437'); //database connection process.

	
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>