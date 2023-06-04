<?php

$minusid = $_REQUEST['minusid'];
$bag = unserialize($_COOKIE['bag']);

unset($bag[$minusid]);
setcookie('bag', serialize($bag), time() + (86400 * 30), '/');
echo "removed";

?>