<!-- ##### Footer Area Start ##### -->
<?php
require_once(__DIR__.'/footer.php')

?>
    <!-- ##### Footer Area End ##### -->

<?php
require_once(__DIR__.'/scripts.php');
require_once(__DIR__.'/add-cart-modal.php');
require_once(__DIR__.'/delete-cart-modal.php');
?>

<script>
    $(".add_to_cart").on("click", function(e) {
        // console.log($(this).attr("id"))
        $("#recordId").val($(this).attr("id"));
        $("#delete_class_name").val($(this).attr("class_name"));
    });

    $(".delete-from-cart").on("click", function(e) {
        console.log("hii");
        console.log($(this).attr("id"))
        $("#recordId2").val($(this).attr("id"));
        
    });
</script>
    
</body>

</html>