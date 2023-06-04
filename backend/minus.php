<?php

$minusid = $_REQUEST['minusid'];
$bag = unserialize($_COOKIE['bag']);

if ($bag[$minusid]['qty'] == 1) {

    unset($bag[$minusid]);
    setcookie('bag', serialize($bag), time() + (86400 * 30), '/');
    echo "remove";

} else {

    $bag[$minusid]['qty'] -= 1;
    setcookie('bag', serialize($bag), time() + (86400 * 30), '/');
    echo "success";

}



?>