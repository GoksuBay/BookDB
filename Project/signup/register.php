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
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Sign up</h1>
                    <form enctype="multipart/form-data" action="../login/login.php" method="post">
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="email" name="email" placeholder="E-mail" required />
                        <input type="password" name="pw" placeholder="Password" required />
                        <input type="password" name="pw_repeat" placeholder="Repeat Password" required />
                        <input type="file" name='photo' accept="image/*" required />
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
</html>    