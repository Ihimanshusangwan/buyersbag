<?php


$plusId = $_REQUEST['plusid'];
$bag = unserialize($_COOKIE['bag']);

$bag[$plusId]['qty'] += 1;
setcookie('bag', serialize($bag), time() + (86400 * 30), '/');
echo "success";

?>