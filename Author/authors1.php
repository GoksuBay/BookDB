<?php

require "dbconnect.php";

$dbQuery=$db->prepare("SELECT * FROM book WHERE id=:id");
$dbQuery->execute(array(
  'id' => $_GET['id']));
$dbPull=$dbQuery->fetch(PDO::FETCH_ASSOC);

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

nav{
float: left;
padding: 20px;
text-align: center;
font-size: 20px;
width:300px;
height:400px;
}

article{
float: right;
padding: 20px;
padding-top: 30px;
text-align: left;
font-size: 18px;
width:950px;
height:400px;


}

.books{
    padding-left: 60px;
}

</style>

<header>
    <?php 
    echo $dbPull['name'];
    ?>
</header>

<nav>

<img src="authorpic.jpg" width="200" height="200"> 
<?php echo $dbPull['photo']; ?>
</img>

<p>Score :
    <?php
    echo $dbPull['score'];
    ?>

</p>
<p>Date Of Birth:
    <?php
    echo $dbPull['dateofBirth'];
    ?>

</p>
</nav>

<article>
<h3>About</h3>
<p> 
    <?php
    echo $dbPull['about'];
    ?>
</p>
</article>


<books>
<h3>Books Top 6</h3>
<img src="authorsbookpic.jpg" width="210" height="300">

</books>

<footer>
<h3>All Books</h3>
<ul style="list-style-type:none;">

<li>
<li><a href="bookInfo.php?id=<?php echo $pullData['id'] ?>"> <?php print_r($pullData['bookID']); ?> </a> </li>



</ul>





</footer>




















</body>
</html>