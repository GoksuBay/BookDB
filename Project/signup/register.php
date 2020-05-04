<?php
session_start();
$_SESSION['message']= '';
require "../includes/dbconnect.php";

if (isset($_POST["submit"]))
{
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pw"];
    $password2 = $_POST["pw_repeat"];
    $profilePhoto = $_FILES['photo']['name'];
    
    //Check whether two passwords match or not.
    if($_POST['pw'] == $_POST['pw_repeat'])
    {
        $password = md5($password);
        //Check whether file is image or not.
        if(preg_match("!image!", $_FILES['photo']['type']))
        {
            $check = "SELECT * FROM users WHERE (username='$username' OR email='$email')";
            $res = mysqli_query($connect, $check);

            if(mysqli_num_rows($res) < 1)
            {   
                if(move_uploaded_file($_FILES['photo']['tmp_name'], '../Admin/images/user'.$username.'_'.$profilePhoto))
                {
                    $photoPath = 'images/users/'.$username.'_'.$profilePhoto;
                    $sql = "INSERT INTO users (username, email, pw, photo) VALUES ('$username', '$email', '$password', '$photoPath')";
                    mysqli_query($connect, $sql);
                }
                else
                    $_SESSION['message'] = 'File upload failed';
            }
            else
            $_SESSION['message'] = 'Username or Email already exist.';
        }
        else
            $_SESSION['message'] = 'You may upload images only';
    }
    else
    {
        $_SESSION['message'] = "Two password don't match";
    }
}
?>

<!DOCTYPE html>
<head>
<header>Sign Up</header>
<title>Sign Up</title>
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
input[type=text],input[type=email],input[type=password],input[type=submit]{
width:40%;
margin-left: 30%;
margin-right: 30%;
margin-top: 50px;
height:30px;
border: 1px solid slateblue;
border-radius: 5px;
}
input[type=file]{
    width:40%;
margin-left: 30%;
margin-right: 30%;
margin-top: 50px;
height:30px;
border-radius: 5px;
}


</style>
<br>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
               
                    <form enctype="multipart/form-data" action="signup.php" method="post">
                        <input type="text" name="username" placeholder="Username" required /><br>
                        <input type="email" name="email" placeholder="E-mail" required /> <br>
                        <input type="password" name="pw" placeholder="Password" required /><br>
                        <input type="password" name="pw_repeat" placeholder="Repeat Password" required /><br>
                        <input type="file" name='photo' accept="image/*" required /><br>
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
    </body>
</html>    