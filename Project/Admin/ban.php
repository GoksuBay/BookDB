<?php
session_start();
require "../includes/dbconnect.php";
if(isset($_SESSION['adminid']) == NULL)
    header("Location: ../noPermission.php");
$id = intval($_GET['id']);

if(isset($_POST['submit']))
{
    $reason = $_POST['reason'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    $rows = mysqli_fetch_assoc($result);
    $username = $rows['username'];
    $email = $rows['email'];
    $password = $rows['pw'];

    $banQuery = "INSERT INTO bannedusers(id, username, email, pw, reason) VALUES('$id', '$username', '$email', '$password', '$reason')";
    mysqli_query($connect, $banQuery);
    mysqli_query($connect, "DELETE FROM reviews WHERE userID = '$id'");
    mysqli_query($connect, "DELETE FROM users WHERE id = '$id'");
    echo $rows['id'];
    header("Location: userList.php");
}

?>

<!DOCTYPE html>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
                <h1>Login</h1>
                    <form enctype="multipart/form-data" action="ban.php?id=<?php echo $id?>;" method="post">
                        <input type="text" name="reason" placeholder="Reason" required />
                        <input type="submit" name="submit" value = "Ban">
                    </form>
            </section>
        </div>
    </main>
</html>    