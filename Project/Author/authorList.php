<?php session_start();
require "../includes/dbconnect.php";

$authorlistSql="SELECT * FROM author";
$authorlistResult=mysqli_query($connect,$authorlistSql); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Authors</title>
<meta charset="utf-8">
<header>Authors</header>
</head>
<body style="background-color: lavender">

<style>

header{
padding: 20px;
background-color:slateblue;
text-align: center;
font-family:monospace;
font-size: 25px;
color: black;
} 
.box {
margin-top: 30px;
margin-left: 20px;
margin-right: 20px;
padding-block: 25px;
float: left;
height: auto;

}



</style>

</body>
</html>
<?php




while($pullData=mysqli_fetch_assoc($authorlistResult)){
    echo '<div class="box">';
    ?>

    

<nav>


<li style="list-style-type: none"><img src=  "<?php echo '../Admin/'  .$pullData['photo'];  ?> " style="width:150px;height:150px;"> </img> </li> 
<li style="list-style-type: none"> <a href="authorInfo.php?id=<?php echo $pullData['id']?>"><p style="font-family: monospace"><?php  print_r($pullData['name']);?></a></p> </li>

</nav>
<?php echo '</div>'; } ?>