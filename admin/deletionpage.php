<?php
include("../backend/connect.php");
include("../backend/deleteitem.php");
echo "<h3><br> Redirecting to home page............. </h3>";
header("Refresh:2;url=index.php");
mysqli_close($conn);
?>