<?php
session_start();
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="adminHome.css">
    <meta charset="utf-8">
</head>
<body>

    <main>

        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Home Page</h1>
                   <div class="firstbutton"> <input type="button" name="addbook" value="Add Book" onclick="document.location.href=' book.php'"/></div>
                        <div class="secondbutton"><input type="button" name="bookList" value="Book List" onclick="document.location.href=' bookList.php'"/></div>
                        <div class="thirdbutton"><input type="button" name="addauthor" value="Add Author"onclick="document.location.href=' author.php'" /></div>
                        <div class="fourthbutton"><input type="button" name="authorList" value="Author List"onclick="document.location.href=' authorsList.php'" /></div>
                        <div class="fifthbutton"><input type="button" name="addcategory" value="Add Category"onclick="document.location.href=' category.php'" /></div>
                       <div class="sixthbutton"> <input type="button" name="userList" value="User List"onclick="document.location.href=' userList.php'" /></div>
            </section>
        </div>
    </main>
</body>
</html>