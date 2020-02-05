<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form action="http://localhost/essence/helper/routing.php" method="POST">
    <input type="hidden" value="6" id="product_id" name="product_id">
    <p>Quantity</p>
    <input type="text" name="quantity">
    <button type="submit" name="add-to-cart">Submit</button>
    <p id="success"></p>
    </form>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
   </script> 
   <script>
 $(document).ready(function() {
     $product_id = $("#product_id").val();
           $.ajax({
    url: "http://localhost/essence/helper/routing.php",
    method: "POST",
    data: {
      add_category_user: true,
      product_id:$product_id
    },
    dataType: "json",
    success: function(data) {
      //$("#success").html("success");
      console.log("hii");
    },
    error: function(error) {
      console.log(error);
    }
  });
    //console.log("hello");
        });
</script>
</body>

</html>