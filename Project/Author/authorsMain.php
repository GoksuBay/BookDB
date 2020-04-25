<?php

require "dbconnect.php";

mysqli_select_db($connect ,"author");
$dbQuery=$db->prepare("SELECT * FROM author WHERE id=:id");
$dbQuery-> execute();
while($pullData=$dbQuery->fetch(PDO::FETCH_ASSOC)){


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

<li><a href="authors1.php?id=<?php echo $pullData['id'] ?>"> <?php print_r($pullData['name']); ?> </a> </li>

</ul>




</nav>
</body>
</html>