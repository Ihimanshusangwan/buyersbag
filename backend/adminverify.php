<?php



include("connect.php");

$query = "SELECT * FROM verify;";

$query_result = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($query_result);

$username = $result['username'];

$password = $result['password'];

if (isset($_REQUEST['submit'])) {

    if ($_REQUEST['username'] == "" || $_REQUEST['password'] == "") {

        echo "<h1>Fill all fields <br> Redirecting to login page............. </h1>";

        header("Refresh:4;url=../admin/adminlogin.php");



    } else if ($_REQUEST['username'] !== $username || $_REQUEST['password'] !== $password) {

        echo "<h1>wrong login details .. please retry <br> Redirecting to login page............. </h1>";

        header("Refresh:4;url=../admin/adminlogin.php");

    } else {

        session_start();

        $_SESSION['user'] = $username;

        header("location:../admin/index.php");



    }

}

?>