<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "books";

$connect = mysqli_connect($server, $user, $password, $db);

if(!$connect)
{
    die("Connection Failed:" .mysqli_connect_error());
}
?>
