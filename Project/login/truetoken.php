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
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Login</h1>
                    <form enctype="multipart/form-data" action="truetoken.php?email=<?php echo $email?>&token=<?php echo $token?>" method="post">
                        <input type="password" name="pw" placeholder="New Password" required />
                        <input type="password" name="pw_repeat" placeholder="Repeat Password" required />
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
</html>    