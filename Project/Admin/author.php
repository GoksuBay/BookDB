<?php
session_start();
$_SESSION['message']= '';
require "../includes/dbconnect.php";
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");
if (isset($_POST["submit"]))
{
    
    $name = $_POST['name'];
    $dateofBirth = $_POST['dateofBirth'];
    $about = $_POST['about'];
    $photo = $_FILES['photo']['name'];

    if(preg_match("!image!", $_FILES['photo']['type']))
        {

              
                if(move_uploaded_file($_FILES['photo']['tmp_name'], 'images/author/'.$name.'_'.$photo))
                {
                    $photoPath = 'images/author/'.$name.'_'.$photo;
                    $sql = "INSERT INTO author (name, photo, about, dateofBirth) VALUES ('$name', '$photoPath', '$about', '$dateofBirth')";
                    mysqli_query($connect, $sql);
                }
                else
                    echo 'File upload failed';
        }
        else
            echo 'You may upload images only';
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Author</title>
    <link rel="stylesheet" type="text/css" href="author.css">
    <meta charset="utf-8">
</head>
<body>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Author</h1>
                    <form enctype="multipart/form-data" action="author.php" method="post">
                       <div><input type="text" name="name" placeholder="Name Surname" required /></</div>
                       <br><br>
                       <div><input type="text" name="dateofBirth" placeholder="Date of Birth" required /></div>
                       <br><br>
                        <div><textarea rows="4" cols="50" name ="about" required placeholder="About"></textarea></div>
                        <br><br>
                        <div><input type="file" name='photo' accept="image/*" required />
                    
                        <input type="submit" name="submit" value = "Submit"></div>
                        <br><br>
                    </form>
            </section>
        </div>
    </main>
</body>
</html> 