<?php session_start();

require_once '../includes/dbconnect.php'; ?>

<?php 
$ISBN=intval($_GET['ISBN']);
$userID=$_SESSION['id'];



$bookListSql= "SELECT * FROM book WHERE ISBN='$ISBN'";
$bookListResult=mysqli_query($connect,$bookListSql);
$pullData=mysqli_fetch_assoc($bookListResult); //Selects book using the ISBN.
$authorID=$pullData['authorID'];
$categoryID=$pullData['categoryID'];

$bookAuthorSql="SELECT name FROM author WHERE id='$authorID' ";
$bookAuthorResult=mysqli_query($connect,$bookAuthorSql);
$pullAuthorData=mysqli_fetch_assoc($bookAuthorResult); //Selects author using the authorID.

$bookCategorySql="SELECT categoryName FROM category WHERE id='$categoryID'";
$bookCategoryResult=mysqli_query($connect,$bookCategorySql);
$pullCategoryData=mysqli_fetch_assoc($bookCategoryResult);

$reviewListSql= "SELECT * FROM reviews WHERE userID='$userID' AND bookID='$ISBN'";
$reviewListResult=mysqli_query($connect,$reviewListSql);
$pullReviewData=mysqli_fetch_assoc($reviewListResult);

$review=$_POST['review'];


if (isset($_POST['submit'])) {

	if (mysqli_num_rows($reviewListResult)<1) {



		if (isset($_SESSION['id'])) {

			$sql="INSERT INTO reviews (review, bookID, userID) VALUES ('$review','$ISBN','$userID')";
			mysqli_query($connect,$sql);

		}
	} 
	else

		$_SESSION['message']='You already have a review,please edit this review.';

	
}



?>

<html>
<head>
	<title>Book Informations</title>
</head>

<body>
</br>	
<img src="<?php echo "../Admin/".$pullData['image']; ?>"> <h1><?php echo $pullData['name']; ?></h1></img>

<hr color="black" /> 
<p><h1> Summary: <br> <?php echo $pullData['summary']; ?> </h1>  </p>            
<hr color="black" />
<h1>Book Informations: <br>
	<ul>
		<!-- List for book informations  -->
		<a href="">  <li> Author:<?php echo $pullAuthorData['name']; ?> </li>         </a>
		<li> ISBN:<?php echo $pullData['ISBN']; ?> </li>
		<li> Score:   <?php echo $pullData['score']; ?></li>
		<li> Category: <?php echo $pullCategoryData['categoryName']; ?>  </li>
		<li> Release Date:  <?php echo $pullData['releaseDate']; ?></li>
		<hr color="black" /> 
	</h1>
</ul>
<h1>REVIEWS: </h1>
<table style="width: 100%" border="1">
	<tr>
		<th>Username </th>
		<th>Rewiew </th>
		<th>Like rewiew </th>
		<th>Dislike rewiew </th>
	</tr>
	
	<?php 
	$reviewListSql= "SELECT * FROM reviews WHERE bookID='$ISBN'";
	$reviewListResult=mysqli_query($connect,$reviewListSql);
	
	while($pullReviewData=mysqli_fetch_assoc($reviewListResult)){
		$userIdNotLoggedIn=$pullReviewData['userID'];
		$userListSql="SELECT * FROM users WHERE id='$userIdNotLoggedIn'";
		$userListResult=mysqli_query($connect,$userListSql);
		while($pullUserData=mysqli_fetch_assoc($userListResult)){

			$userName=$pullUserData['username'];
			$userMail=$pullUserData['email'];



			?>
			<tr>
				<br>
				<td><?php echo $userName; ?></td>
				<td><?php echo $pullReviewData['review']; ?></td>
				<form action="bookComment.php?userID=<?php echo $userIdNotLoggedIn ?>" method="POST">
					<td align="center"><a href="bookComment.php?userID=<?php echo $userIdNotLoggedIn ?>">  <button type="submit" name="like" >Like</button> </a></td>
					<td align="center"><a href="bookComment.php?userID=<?php echo $userIdNotLoggedIn ?>"><button type="submit" name="dislike" >Dislike</button></td>

					</form>
				</tr>

			<?php }} ?>
		</table>
		Add review:
		<br>
		<form action="bookInfo.php?ISBN=<?php echo $ISBN ?>" title="Review" enctype="multipart/form-data" method="POST">

			<textarea rows="10" cols="50" name="review" style="overflow: auto;"></textarea>

			<div>
				<input type="submit" name="submit" value="Add" />
				<input type="reset" value="Clear" />
			</div>
		</form>


	</body>


	</html>