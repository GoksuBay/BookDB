<?php session_start();

require_once '../includes/dbconnect.php'; ?>

<?php 
$ISBN=intval($_GET['ISBN']);
$userID=0;

if (isset($_SESSION['id'])) {
	$userID=$_SESSION['id'];
}


$bookListSql= "SELECT * FROM book WHERE ISBN='$ISBN'";
$bookListResult=mysqli_query($connect,$bookListSql);
$pullData=mysqli_fetch_assoc($bookListResult); //Selects book using the ISBN.
$authorID=$pullData['authorID'];
$categoryID=$pullData['categoryID'];
$bookScore=$pullData['score'];

$bookAuthorSql="SELECT name FROM author WHERE id='$authorID' ";
$bookAuthorResult=mysqli_query($connect,$bookAuthorSql);
$pullAuthorData=mysqli_fetch_assoc($bookAuthorResult); //Selects author using the authorID.

$bookCategorySql="SELECT categoryName FROM category WHERE id='$categoryID'";
$bookCategoryResult=mysqli_query($connect,$bookCategorySql);
$pullCategoryData=mysqli_fetch_assoc($bookCategoryResult);

$reviewListSql= "SELECT * FROM reviews WHERE userID='$userID' AND bookID='$ISBN'";
$reviewListResult=mysqli_query($connect,$reviewListSql);
$pullReviewData=mysqli_fetch_assoc($reviewListResult);




if (isset($_POST['submit'])) {

	if ($_POST['Score']!="-") {

		if (mysqli_num_rows($reviewListResult)<1) {

			if (isset($_SESSION['id'])) {
				$review=$_POST['review'];
				$choosenPoint=$_POST['Score'];
				$bookScore+=$choosenPoint;
				$sql="INSERT INTO reviews (review, bookID, userID) VALUES ('$review','$ISBN','$userID')";
				mysqli_query($connect,$sql);
				$sqlBookScore="UPDATE book SET score='$bookScore' WHERE ISBN='$ISBN'";
				mysqli_query($connect,$sqlBookScore);

			}
		} 
	}
	if (!isset($_SESSION['id'])) {
		echo "You can not add a review without logged in.";
	}

	elseif (mysqli_num_rows($reviewListResult)==1) {
		echo "You have already added a review for this book.";
	}

	elseif ($_POST['Score']=="-") {
		echo "You have to choose a point to add a review";
	}
	
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
<p><h1> Summary: </h1> <h3> <?php echo $pullData['summary']; ?>  </h3> </p>            
<hr color="black" />
<h1>Book Informations: <br>
	<ul>
		<!-- List for book informations  -->
		<a href="../Author/authors1.php?id=<?php echo $pullData['authorID'] ?>">  <li> Author:<?php echo $pullAuthorData['name']; ?> </li>         </a>
		<li> ISBN:<?php echo $pullData['ISBN']; ?> </li>
		<li> Score:   <?php echo $pullData['score']; ?></li>
		<a href="../Categories/categories1.php?id=<?php echo $pullData['categoryID'] ?>"> <li> Category: <?php echo $pullCategoryData['categoryName']; ?>  </li></a> 
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

			<textarea rows="10" cols="50" name="review" style="overflow: auto;" required></textarea>
			<label for="Scores" align="right" >Give a point for the book:</label>

			<select name="Score" >
				<option  value="-">-</option>
				<option  value="0">0</option>
				<option  value="1">1</option>
				<option  value="2">2</option>
				<option  value="3">3</option>
				<option  value="4">4</option>
				<option  value="5">5</option>
				<option  value="6">6</option>
				<option  value="7">7</option>
				<option  value="8">8</option>
				<option  value="9">9</option>
				<option  value="10">10</option>
			</select>
			<div>
				<input type="submit" name="submit" value="Add" />
				<input type="reset" value="Clear" />
			</div>
		</form>
		


	</body>


	</html>