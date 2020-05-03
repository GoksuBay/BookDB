<?php
session_start();
require "../includes/dbconnect.php";
if(isset($_SESSION['id']) == NULL)
{
    $email = $_GET['email'];
    if(isset($_POST['submit']))
    {
        $token = $_POST['token'];
        $query = "SELECT * FROM forgottenpassword WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $hashtoken = md5($token);
            $check = "SELECT * FROM forgottenpassword WHERE email = '$email' AND token = '$hashtoken'";
            $res = mysqli_query($connect, $check);
            if(mysqli_num_rows($res) > 0)
            {
                header("Location: truetoken.php?email=".$email."&token=".$token);
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
<header>Reset Password</header>
<title>Reset Password</title>
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
input[type=text],input[type=submit]{
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
                    <form enctype="multipart/form-data" action="resetPassword.php?email=<?php echo $email?>" method="post">
                        <input type="text" name="token" placeholder="Token" required style="font-family: monospace"/>
                        <input type="submit" name="submit" value = "Submit" style="font-family: monospace">
                    </form>
            </section>
        </div>
    </main>
</body>
</html>    