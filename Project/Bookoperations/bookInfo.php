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
				$sql="INSERT INTO reviews (review, bookID, userID,givenScore) VALUES ('$review','$ISBN','$userID',$choosenPoint)";
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
	<title><?php echo $pullData['name']; ?></title>
	<header><?php echo $pullData['name']; ?></header>
</head>

<body style="background-color: lavender">
<style>
article{
float: right;
padding: 20px;
padding-top: 30px;
text-align: left;
font-size: 18px;


}
header{
padding: 20px;
background-color:slateblue;
text-align: center;
font-family:monospace;
font-size: 25px;
color: black;
} 

nav{
float: left;
padding: 20px;
text-align: center;
font-size: 20px;
width:300px;
height:400px;
}
section {
  display: -webkit-flex;
  display: flex;
}
tr,th,td{
	font-family: monospace;
}
</style>



<section>
	<nav>
<img src="<?php echo "../Admin/".$pullData['image']; ?>" style="width:150px;height:200px"> </img>

<h3 style="font-family: monospace">Book Informations: </h3>
	
<li style="list-style-type: none">
		<!-- List for book informations  -->
		<a href="../Author/authorInfo.php?id=<?php echo $pullData['authorID'] ?>"> <p style="font-family: monospace">  Author:<?php echo $pullAuthorData['name']; ?> </p>        </a>
		<p style="font-family:monospace" > ISBN:<?php echo $pullData['ISBN']; ?></p> 
		<p style="font-family: monospace"> Score:   <?php echo $pullData['score']; ?></p>
		<a href="../Categories/categoryInfo.php?id=<?php echo $pullData['categoryID'] ?>"> <p style="font-family: monospace"> Category: <?php echo $pullCategoryData['categoryName']; ?>  </p></a> 
		<p style="font-family: monospace"> Release Date:  <?php echo $pullData['releaseDate']; ?></p>
</li>


</nav>

<article>

<h3 style="font-family: monospace"> Summary: </h3> 
<p style="font-family: monospace"><?php echo $pullData['summary']; ?> 
</p>
 </article>      
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 <h2 style="font-family: monospace">REVIEWS: </h2>
<footer>

<table style="width: 100%" border="1">
	<tr>
		<th>Username </th>
		<th>Rewiew </th>
		<th>Like Rewiew </th>
		<th>Dislike Rewiew </th>
		<th>Delete Review</th>
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
					<td align="center" style="font-family: monospace">  <button type="submit" name="like" >Like</button> </td>
					<td align="center" style="font-family: monospace">  <button type="submit" name="dislike" >Dislike</button></td>
						</form>

						<form  action="bookComment.php?reviewID=<?php echo $pullReviewData['id'] ?>" method="POST">
							<td align="center" style="font-family: monospace">	<button type="submit" name="Delete" >Delete</button></td>
						</form>
					</tr>

				<?php }} ?>
			</table >
			<p style="font-family: monospace">Add Review:</p>
			<br>
			<form action="bookInfo.php?ISBN=<?php echo $ISBN ?>" title="Review" enctype="multipart/form-data" method="POST">

				<textarea rows="10" cols="50" name="review" style="overflow: auto;" required></textarea>
				<label for="Scores" align="right" style="font-family: monospace" >Give a point for the book:</label>

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

		</footer>

		</body>


		</html>