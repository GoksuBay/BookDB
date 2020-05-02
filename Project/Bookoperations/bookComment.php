<?php  session_start(); 
require_once '../includes/dbconnect.php';?>
<?php 
$userID=$_GET['userID'];
$userSql="SELECT * FROM users WHERE id='$userID'";
$userResult=mysqli_query($connect,$userSql);
$pullUserData=mysqli_fetch_assoc($userResult);
$userScore=$pullUserData['score'];
$sessiOnId=$_SESSION['id'];





if (isset($_POST['like'])) {
	


if ($_SESSION['id']!=$userID&&isset($_SESSION['id'])) {
	$userScore+=1;
	$userSql="UPDATE users SET score='$userScore' WHERE id='$userID'";
	$userResult=mysqli_query($connect,$userSql);
    echo "You liked the review successfully. <br>";

} else
echo "You are not be able to like your review.Or you may not logged in.<br>";
}


if (isset($_POST['dislike'])) {
	
if ($_SESSION['id']!=$userID&&isset($_SESSION['id'])) {
	$userScore-=1;
	$userSql="UPDATE users SET score='$userScore' WHERE id='$userID'";
	$userResult=mysqli_query($connect,$userSql);
	echo "You disliked the review successfully <br>";
} else
echo "You are not be able to dislike your review.Or you may not logged in.<br>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="bookList.php">Click here to go book lists page...</a>
</body>
</html>




