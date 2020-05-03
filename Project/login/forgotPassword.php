<?php
session_start();
require "../includes/dbconnect.php";
require "../includes/config.php";
if(isset($_SESSION['id']) == NULL)
{
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $token = rand(1000,10000);
            $mail->SetFrom("noreply@brdb", "BRDB Support"); // Mail adresi
            $mail->AddAddress($email); // Gönderilecek kişi
            $mail->Subject = "Forgotten Password";
            $mail->Body = "Your token is: ".$token;
            $mail->Send();
            $token = md5($token);
            mysqli_query($connect, "INSERT INTO forgottenpassword(token, email) VALUES ('$token', '$email')");
            header("Location: resetpassword.php?email=".$email);
        }
        else
            echo "Error! Email adress not found";
    }
}
else
    header("Location: ../errorLogin");
?>

<!DOCTYPE html>
<head>
<header>I Forgot My Password </header>
<title>I Forgot My Password</title>
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
input[type=email],input[type=submit]{
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
                
                    <form enctype="multipart/form-data" action="forgotPassword.php" method="post">
                        <input type="email" name="email" placeholder="Email" required style="font-family: monospace"/>
                        <input type="submit" name="submit" value = "Submit" style="font-family: monospace">
                    </form>
            </section>
        </div>
    </main>
    </body>
</html>    