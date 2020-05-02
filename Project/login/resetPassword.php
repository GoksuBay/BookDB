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
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Login</h1>
                    <form enctype="multipart/form-data" action="resetPassword.php?email=<?php echo $email?>" method="post">
                        <input type="text" name="token" placeholder="Token" required />
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
</html>    