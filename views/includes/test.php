<?php
    require_once(__DIR__.'/header.php');
    $res = $di->get("UserSpecific")->isBirthDay(1);
    if($res){
        print_r(count($di->get("Event")->getProductsForBday()));
    }
?>