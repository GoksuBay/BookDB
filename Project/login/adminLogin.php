<?php
session_start();
if(isset($_SESSION['id']) == NULL)
{

if (isset($_POST['submit']))
{
    require "../includes/dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['pw'];
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = mysqli_stmt_init($connect);

   
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
            if(md5($password) !== $row['password'])
            {
                echo "Wrong PW";
            }
            else if(md5($password) === $row['password'])
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                header("Location ../home.php");
            }
        }
        else
            echo "Error2";

    }
    else
        echo "Error1";

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
                    <form enctype="multipart/form-data" action="adminLogin.php" method="post">
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="password" name="pw" placeholder="Password" required />
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
</html>    