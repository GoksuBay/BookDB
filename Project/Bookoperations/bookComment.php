<?php  session_start(); 
require_once '../includes/dbconnect.php';?>
<?php 
$bookID=0;
$sessiOnId=0;
$reviewID=0;

if (isset($_SESSION['id'])) {
	$userID=$_GET['userID'];
	$sessiOnId=$_SESSION['id'];
	$reviewID=$_GET['reviewID'];
	
	
}
$userSql="SELECT * FROM users WHERE id='$userID'";
$userResult=mysqli_query($connect,$userSql);
$pullUserData=mysqli_fetch_assoc($userResult);
$userScore=$pullUserData['score'];


$reviewSql="SELECT * FROM reviews WHERE id='$reviewID'";
$reviewResult=mysqli_query($connect,$reviewSql);
$pullReviewData=mysqli_fetch_assoc($reviewResult);
$userReviewID=$pullReviewData['userID'];
$givenScore=$pullReviewData['givenScore'];
$bookID=$pullReviewData['bookID'];

$bookSql="SELECT * FROM book WHERE ISBN='$bookID'";
$bookResult=mysqli_query($connect,$bookSql);
$pullBookData=mysqli_fetch_assoc($bookResult);
$bookScore=$pullBookData['score'];

if (isset($_POST['Delete'])) {
	if ($_SESSION['id']==$userReviewID) {
		$bookScore-=$givenScore;
		$reviewDeleteSql="DELETE FROM reviews WHERE id='$reviewID'";
		$reviewDeleteResult=mysqli_query($connect,$reviewDeleteSql);
		
		$updateBookSql="UPDATE book SET score='$bookScore' WHERE ISBN='$bookID'";
		$updateBookResult=mysqli_query($connect,$updateBookSql); 

		echo " <br>Review deleted successfully <br>";
	}
	else echo "<br>You can not delete a review that is not yours.Or you may not logged in. <br>";
}


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
<body style="background-color: lavender">
	<a href="bookList.php">Click here to go book lists page...</a>
</body>
</html>




