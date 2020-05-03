<?php
session_start();
require "../includes/dbconnect.php";
if(isset($_SESSION['id']) == NULL)
{
    $email = $_GET['email'];
    $token = $_GET['token'];
    if(isset($_POST['submit']))
    {
        $hashtoken = md5($token);
        $query = "SELECT * FROM forgottenpassword WHERE token = '$hashtoken' AND email = '$email'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $password = $_POST['pw'];
            $passwordcheck = $_POST['pw_repeat'];
            if($_POST['pw'] == $_POST['pw_repeat'])
            {
                $password = md5($password);
                mysqli_query($connect, "UPDATE users SET pw = '$password' WHERE email= '$email'");
                mysqli_query($connect, "DELETE FROM forgottenpassword WHERE email= '$email'");
                header("Location: login.php");
            }
        }
        else
            echo "Error!";
    }
}
else
    header("Location: ../errorLogin.php");
?>

<!DOCTYPE html>
<head>
<header>True Token</header>
<title>True Token</title>
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
input[type=password],input[type=submit]{
width:40%;
margin-left: 30%;
margin-right: 30%;
margin-top: 50px;
height:30px;
border: 1px solid slateblue;
border-radius: 5px;
}


</style>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                    <form enctype="multipart/form-data" action="truetoken.php?email=<?php echo $email?>&token=<?php echo $token?>" method="post">
                        <input type="password" name="pw" placeholder="New Password" required style="font-family: monospace" />
                        <input type="password" name="pw_repeat" placeholder="Repeat Password" required style="font-family: monospace" />
                        <input type="submit" name="submit" value = "Submit" style="font-family: monospace">
                    </form>
            </section>
        </div>
    </main>
</html>    