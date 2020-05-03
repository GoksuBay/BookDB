<?php
session_start();
if(isset($_SESSION['id']) == NULL || isset($_SESSION['adminid']) == NULL )
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
                $_SESSION['adminid'] = $row['id'];
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
<head>
<header>Admin Login</header>
<title>Admin Login</title>
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
input[type=text],input[type=password],input[type=submit]{
width:40%;
margin-left: 30%;
margin-right: 30%;
margin-top:70px;
height:30px;
border: 1px solid slateblue;
border-radius: 5px;
}




</style>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                    <form enctype="multipart/form-data" action="adminLogin.php" method="post">
                        <input type="text" name="username" placeholder="Username" required style="font-family: monospace" />
                        <input type="password" name="pw" placeholder="Password" required style="font-family: monospace" />
                        <input type="submit" name="submit" value = "Submit" style="font-family: monospace">
                    </form>
            </section>
        </div>
    </main>
    </body>
</html>    