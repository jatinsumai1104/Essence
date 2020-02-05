<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="<?php echo BASEASSETS;?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo BASEASSETS;?>js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo BASEASSETS;?>js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo BASEASSETS;?>js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="<?php echo BASEASSETS;?>js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="<?php echo BASEASSETS;?>js/active.js"></script>
    <script src="<?php echo BASEASSETS; ?>vendors/bootstrap-toastr/toastr.min.js"></script>
    <script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    </script>
    <?php require_once(__DIR__."/toasters.php");?>
