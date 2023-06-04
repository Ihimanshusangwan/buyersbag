<?php
if (isset($_COOKIE['bag'])) {
    unset($_COOKIE['bag']);
    setcookie('bag', null, -1, '/');
    echo "removed";
} else {
    echo "emptycart";
}
?>