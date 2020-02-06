<?php
require_once(__DIR__.'/header.php');
if(Session::getSession("user_id") == null){
    Util::redirect("login");
}
?>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php
        require_once(__DIR__.'/navigation.php')
    ?>
    <!-- ##### Header Area End ##### -->
    