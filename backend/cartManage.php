<?php
$id = $_REQUEST['id'];

if (isset($_COOKIE['bag'])) {
    $bag = unserialize($_COOKIE['bag']);
} else {
    $bag = array();
}

$bag[$id]['pid'] = $id;
$bag[$id]['qty'] = 1;

setcookie('bag', serialize($bag), time() + (86400 * 30), '/');

print_r($bag);
?>