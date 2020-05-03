<?php
require "includes/dbconnect.php";
$id = $_GET['id'];
$query = "SELECT reason FROM bannedusers WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$reason = mysqli_fetch_assoc($result);
echo "You have been banned. Reason: ".$reason['reason'];
?>

<!DOCTYPE html>
    <main>
        <div class ="wrapper-main">
            <section class ="section-default">
            </section>
        </div>
    </main>
</html>