<?php
session_start();
$_SESSION['message']= '';
require "../includes/dbconnect.php";
if(isset($_SESSION['adminid']) != NULL)
    header("Location: ../noPermission.php");

if (isset($_POST["submit"]))
{
    
    $name = $_POST['name'];
    $photo = $_FILES['photo']['name'];

    if(preg_match("!image!", $_FILES['photo']['type']))
        {
            $check = "SELECT * FROM category WHERE categoryName = '$name'";
            $res = mysqli_query($connect, $check);

            if(mysqli_num_rows($res) < 1)
            {   
                if(move_uploaded_file($_FILES['photo']['tmp_name'], 'images/category'.$name.'_'.$photo))
                {
                    $photoPath = 'images/category'.$name.'_'.$photo;
                    $sql = "INSERT INTO category (categoryName, photo) VALUES ('$name', '$photoPath')";
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
?>

<!DOCTYPE html>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Add Category</h1>
                    <form enctype="multipart/form-data" action="category.php" method="post">
                        <input type="text" name="name" placeholder="CategoryName" required />
                        <input type="file" name='photo' accept="image/*" required />
                        <input type="submit" name="submit" value = "Submit">
                    </form>
            </section>
        </div>
    </main>
</html>    