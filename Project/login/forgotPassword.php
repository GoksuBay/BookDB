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
            $mail->SetFrom("noreply@brdb", "Forgotten Password"); // Mail adresi
            $mail->AddAddress($email); // Gönderilecek kişi
            $mail->Subject = "BRDB Support";
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
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Login</h1>
                    <form enctype="multipart/form-data" action="forgotPassword.php" method="post">
                        <input type="email" name="email" placeholder="Email" required />
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
</html>    