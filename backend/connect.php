<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "buyersbag_db";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("can't connect to server");
}
?>