<?php session_start(); 
if(isset($_SESSION['adminid']) != NULL)
header("Location: ../noPermission.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Authors List</title>
<link rel="stylesheet" type="text/css" href="authorsList.css">
<meta charset="utf-8">
<h1><header>Authors</header></h1>
</head>
<body>

<?php


require "../includes/dbconnect.php";

if(isset($_POST["delete"]))
{
    $id = intval($_GET['id']);
    $queryBook = "DELETE FROM book WHERE authorID ='$id'";
    $queryAuthor = "DELETE FROM author WHERE id = '$id'";
    mysqli_query($connect, $queryBook);
    mysqli_query($connect, $queryAuthor);
}

$authorlistSql="SELECT * FROM author";
$authorlistResult=mysqli_query($connect,$authorlistSql);

while($pullData=mysqli_fetch_assoc($authorlistResult)){
    ?>

    

<nav>

<ul style="list-style-type:none;">

        <div class="oneof"><h2><a <?php echo $pullData['id'] ?> > <?php print_r($pullData['name']); ?></a></h2>
        <form action="authorsList.php?id=<?php echo $pullData['id']?>" method="post">
         <div><input type="submit" value="Delete" name="delete">
         </form>
         <input type="button" value="More Info" name="moreInfo" onclick="location.href='authorInfo.php?id=<?php echo $rows['id']?>';"></div></div>
</ul>
</nav>
<?php   }  ?>

</body>
</html>
