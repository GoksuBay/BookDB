<?php

$db = mysqli_connect("localhost", "root", "", "books");

if($db->connect_error)
 die("connection failed :" . $db->connect_error);
 
 $authors1 = "SELECT author FROM books";
 $authors2 = mysqli_query($db , $authors1);

 while($row=mysqli_fetch_array($authors2)){

    print $row['author'];
 }



?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Author1</title>
<meta charset="utf-8">

</head>
<body>

<style>

header{
padding: 20px;
background-color:coral;
text-align: center;
font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ;
font-size: 25px;

} 

nav ul{
float: left;
width:400px;
height:720px;
padding: 20px;
background-color:cornflowerblue;
text-align: center;
font-size: 20px;

}

</style>
<header>Authors</header>
<nav>
<ul style="list-style-type:none;">

<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>
<li><a href="author1.html">author1</a></li>


</ul>
</nav>

<nav>

<ul style="list-style-type:none;">
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>
<li><a href="author1.html">author2</a></li>


</ul>




</nav>

<nav>

<ul style="list-style-type:none;">
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>
<li><a href="author1.html">author3</a></li>

</ul>




</nav>
</body>
</html>