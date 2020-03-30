<?php

    $db = mysqli_connect("localhost", "root", "sadsadsa", "books");

    if(isset($_POST['submit'])){
        session_start();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password == $password2){
            $password = md5($password);
            $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($db, $sql);
            $_SESSION['message'] = "You are succesfully signed up";
        }
        else{
            $_SESSION['message'] = "The two passwords do not match";
        }
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>USER SIGN UP</title>
    </head>
    <body>
        <div class ="header">
            <h1> Register for new users </h1>
        </div>

        <form method="post" action="signup.php">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="textInput"></td>
                </tr>

                <tr>
                    <td>e-mail:</td>
                    <td><input type="text" name="email" class="textInput"></td>
                </tr>
                
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" class="textInput"></td>
                </tr>

                <tr>
                    <td>Confrim Password:</td>
                    <td><input type="password" name="password2" class="textInput"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>

            </tabl>
        </form>
    </body>
    </html>