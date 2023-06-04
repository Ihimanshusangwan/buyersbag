<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:adminlogin.php");
}
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
    header("location:adminlogin.php");
} ?>

<div class="header">
    <img class="logo" src="../media/logo.png" alt="Buyer's Bag" onclick="window.location.assign('index.php')">
    <h2 id="admin-heading">Welcome
        <?php
        echo $_SESSION['user'];
        ?>
    </h2>
    <ul class="navbar">
        <li> <a class="navbar-btn" href="index.php">Home</a></li>
        <li> <a class="navbar-btn" href="#categories">Categories</a></li>
        <li> <a class="navbar-btn" href="about.php">About</a></li>
        <li> <span class="navbar-btn contact-btn">Contact</span></li>
    </ul>
    <button id="insertion-btn">Add New Product</button>
    <form action="" id="logout">
        <button type="submit" value="logout" name="logout">Logout</button>
    </form>
</div>