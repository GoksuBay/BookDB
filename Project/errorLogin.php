<?php
echo "You have already logged in!";

if(isset($_POST['logout']))
{
    header("Location: Login/logout.php");
}
?>

<!DOCTYPE html>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                    <form enctype="multipart/form-data" action="errorLogin.php" method="post">
                        <input type="submit" name="logout" value="logout"/>
                    </form>
            </section>
        </div>
    </main>
</html>