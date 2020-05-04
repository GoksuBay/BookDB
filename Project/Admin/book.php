<?php
session_start();
$_SESSION['message']= '';
require "../includes/dbconnect.php";
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");

if (isset($_POST["submit"]))
{
    $categoryName = $_POST['category'];
    $categorysql = "SELECT id FROM category WHERE categoryName = '$categoryName'";
    $categoryResult = mysqli_query($connect, $categorysql);

    $authorName = $_POST['author'];
    $authorsql = "SELECT id FROM author WHERE name = '$authorName'";
    $authorResult = mysqli_query($connect, $authorsql);
    
    $categoryrow = mysqli_fetch_assoc($categoryResult);
    $authorrow = mysqli_fetch_assoc($authorResult);

    $ISBN = $_POST['ISBN'];
    $name = $_POST['name'];
    $releaseDate = $_POST['releaseDate'];
    $summary = $_POST['summary'];
    $categoryid = $categoryrow['id'];
    $authorid = $authorrow['id'];
    $photo = $_FILES['photo']['name'];

    // DropdownList
    /*$result = mysqli_query($connect, "SELECT name FROM category");
                                while($rows = mysqli_fetch_assoc($result))
                                $category = $rows['name'];
                                echo $category;*/

    if(preg_match("!image!", $_FILES['photo']['type']))
        {

              
                if(move_uploaded_file($_FILES['photo']['tmp_name'], 'images/book/'.$name.'_'.$photo))
                {
                    $photoPath = 'images/book/'.$name.'_'.$photo;
                    $sql = "INSERT INTO book (ISBN, name, image, summary, releaseDate, categoryID, authorID) VALUES ( '$ISBN', '$name', '$photoPath', '$summary', '$releaseDate', '$categoryid', '$authorid')";
                    mysqli_query($connect, $sql);
                }
                else
                    $_SESSION['message'] = 'File upload failed';
        }
        else
            $_SESSION['message'] = 'You may upload images only';
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book</title>
    <link rel="stylesheet" type="text/css" href="book.css">
    <meta charset="utf-8">
</head>
<body>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Add Category</h1>
                    <form enctype="multipart/form-data" action="book.php" method="post">
                    
                    <input type="number" name="ISBN" placeholder="ISBN" required/><br>
                        <input type="text" name="name" placeholder="Name" required /><br>
                        <input type="text" name="releaseDate" placeholder="Release Date" required /><br>
                        <textarea rows="4" cols="50" name ="summary" required placeholder="Summary"></textarea><br>
                        <input type="file" name='photo' accept="image/*" required /><br>
                        <div class="select"><select name ="category" style="min-width: 200px; min-height: 30px;border-radius: 20px; border-width: 2px;background-color: #f1f2f6; border-color: #ff6600; font-style: bold; font-family: verdana; padding: 5px; font-size: 15px;">
                            <?php
                                $result = mysqli_query($connect, "SELECT categoryName FROM category");
                                while($rows = mysqli_fetch_assoc($result))
                                {
                                $category = $rows['categoryName'];
                                echo '<option value = "' .$category. '">' .$category.'</option>';
                                }
                            ?>
                        </select></div>
                        <div class="select"><select name ="author" style="min-width: 200px; min-height: 30px; border-radius: 20px; border-width: 2px;background-color: #f1f2f6; border-color: #ff6600; font-style: bold; font-family: verdana; padding: 5px; font-size: 15px;">
                            <?php
                                $result = mysqli_query($connect, "SELECT name FROM author");
                                while($rows = mysqli_fetch_assoc($result))
                                {
                                $author = $rows['name'];
                                echo '<option value = "' .$author. '">' .$author.'</option>';
                                }
                            ?>
                        </select></div>
                        <input type="submit" name="submit" value = "Submit">
                        
                    </form>
            </section>
        </div>
    </main>
</body>
</html>
