<?php
    require_once(__DIR__.'/header.php');
    $res = $di->get("Event")->getProducts("New Country");
    
?>