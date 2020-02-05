<?php
    require_once(__DIR__.'/header.php');
    $res = $di->get("Cart")->isPriceUpdated(Session::getSession("user_id"));
    print_r($res);
?>
