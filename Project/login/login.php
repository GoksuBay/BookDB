<?php
session_start();
if(isset($_SESSION['id']) == NULL)
{

if (isset($_POST['submit']))
{
    require "../includes/dbconnect.php";

    $username = $_POST['username'];
    $password = $_POST['pw'];

    $bancheck = "SELECT * FROM bannedusers WHERE username = ? OR email = ?";
    $banstmt = mysqli_stmt_init($connect);
    if(mysqli_stmt_prepare($banstmt, $bancheck))
    {
        mysqli_stmt_bind_param($banstmt, "ss", $username, $username);
        mysqli_stmt_execute($banstmt);
        $banresult = mysqli_stmt_get_result($banstmt);
        if($bannedrow = mysqli_fetch_assoc($banresult))
        {
            if(md5($password) !== $bannedrow['pw'])
            {
                echo "Wrong PW";
            }
            else if(md5($password) === $bannedrow['pw'])
            {
                header("Location: ../banned.php?id=".$bannedrow['id']);
            }
        }

    }
    
    
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($connect);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result))
        {
            if(md5($password) !== $row['pw'])
            {
                echo "Wrong PW";
            }
            else if(md5($password) === $row['pw'])
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];

                header("Location: ../home.php");
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
<header>Login</header>
<title>Login</title>
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
input[type=text],input[type=password],input[type=submit],input[type=button]{
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
                    <form enctype="multipart/form-data" action="login.php" method="post">
                        <input type="text" name="username" placeholder="Username" required style="font-family: monospace" />
                        <input type="password" name="pw" placeholder="Password" required style="font-family: monospace" />
                        <input type="submit" name="submit" value = "Submit" style="font-family: monospace">
                    </form>
                    <input type="button" name="forgotten" value = "Forgot Password?" onclick="document.location.href='forgotPassword.php'" style="font-family: monospace">
            </section>
        </div>
    </main>
</body>
</html>    