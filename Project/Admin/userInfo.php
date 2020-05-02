<?php require '../includes/dbconnect.php'; 
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
	<h1><b> Users</b></h1>
</head>

<body>
</br>	
<img src="<?php echo $rows['photo']; ?>"></img>
<h1>
 <ul>
  <!-- List for book informations  -->
                        <form enctype="multipart/form-data" action="userInfo.php?id=<?php echo $id?>" method="post">   
                        <li> Username:<input type="text" name="username" value= <?php echo $rows['username']?> required> </input> </li>         </a>
                           <li> email:<input type="email" name="email" value= <?php echo $rows['email']?> required> </input> </li>         </a>
                           <li> score:<?php echo $rows['score']?> </input> </li>         </a>
                           <li> Comment area: </li>
                            <input type="submit" name="submit" value="Submit">
                        </form>
</h1>
</ul>
</body>


</html>