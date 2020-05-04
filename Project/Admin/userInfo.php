<?php 
session_start();
require '../includes/dbconnect.php'; 
if(isset($_SESSION['adminid']) != NULL)
    header("Location: ../noPermission.php");
$id = intval($_GET['id']);
?>

<?php 
$result = mysqli_query($connect,"SELECT * FROM users WHERE id=$id");
$rows = mysqli_fetch_assoc($result);


if (isset($_POST['submit']))
{
   $username = $_POST['username'];
   $email = $_POST['email'];
   $check = "SELECT * FROM users WHERE NOT id= '$id' AND (username='$username' OR email='$email')";
   $res = mysqli_query($connect, $check);
   echo mysqli_num_rows($res);
   if(mysqli_num_rows($res) < 1)
   {
      $query = "UPDATE users SET username= '$username', email= '$email' WHERE id='$id'";
      mysqli_query($connect, $query);
   }
}
?>

<html>
<head>
	<h1> Users</h1>
    <title>User Info</title>
    <link rel="stylesheet" type="text/css" href="userInfo.css">
    <meta charset="utf-8">

</head>

<body>
</br>	
<img src="<?php echo $rows['photo']; ?>"></img>
<nav>
 
  <!-- List for book informations  -->
            <form enctype="multipart/form-data" action="userInfo.php?id=<?php echo $id?>" method="post">   
                <div><h2> Username: </h2><input type="text" name="username" value= <?php echo $rows['username']?> required> </input></div></a><br>
                <div><h2> E-mail: </h2><input type="email" name="email" value= <?php echo $rows['email']?> required> </input></div></a><br>
                <div> <h2>Score: </h2><?php echo $rows['score']?> </input> </div><br></a>
                <div><h2> Comment Area: </h2> </div>
                <div><input type="submit" name="submit" value="Submit"></div><br>
            </form>
</nav>

</body>


</html>