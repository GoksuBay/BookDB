<?php
session_start();
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");
?>

<!DOCTYPE html>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>HomePage</h1>
                    <input type="button" name="addbook" value="Add Book" onclick="document.location.href=' book.php'"/>
                    <input type="button" name="bookList" value="Book List" onclick="document.location.href=' bookList.php'"/>
                        <input type="button" name="addauthor" value="Add Author"onclick="document.location.href=' author.php'" />
                        <input type="button" name="authorList" value="Author List"onclick="document.location.href=' authorsList.php'" />
                        <input type="button" name="addcategory" value="Add Category"onclick="document.location.href=' category.php'" />
                        <input type="button" name="userList" value="User List"onclick="document.location.href=' userList.php'" />
            </section>
        </div>
    </main>
</html>    