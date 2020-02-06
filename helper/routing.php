<?php

require_once ("init.php");

if(isset($_POST["voice_text"])){
    // var_dump($_POST);
    $res = $di->get("Patient")->getPatientFromVoice($_POST);
    if(count($res) > 1){
        SESSION::setSession("voice_text", $_POST["voice_text"]);
        Util::redirect("list_patients");
    }else if(count($res) == 1){
        Util::redirect("prescription_history/{$res[0]['id']}");
    }else{
        Util::redirect("register_patient");
    }
}

if(isset($_POST["patient_register_through_doctor"])){
    $di->get("Patient")->registerHalfPatient($_POST);
}
if(isset($_POST['login_submit'])){
    $di->get('Auth')->login($_POST);
}

if(isset($_POST["voice_prescription_py"])){
    Session::setSession("voice_prescription_py", json_decode($_POST["voice_prescription_py"], true));
    Util::redirect("prescription");
}

if (isset($_POST['logout'])){
    Session::destroySession();
    if(isset($_COOKIE['token'])){
        unset($_COOKIE['token']);
        unset($_COOKIE['user_id']);
    }
    Util::redirect("login");
}

if(isset($_POST["predict_result"])){
    var_dump($_POST);
}

if(isset($_POST["add_category_user"])){
    //echo "hello";
    $di->get('Cart')->addCategoryUser($_POST);
    //echo(json_encode("true"));
}

if(isset($_POST["add_cart"])){
    // var_dump($_POST);
    $di->get('Cart')->addToCart($_POST);
}

if(isset($_POST["delete_cart"])){
    // var_dump($_POST);
    $di->get('Cart')->deleteProductFromCart($_POST);
    Util::redirect("cart");
}

if(isset($_POST["get"])){
    //echo "hii";
    $di->get('Product')->getAllProductsOnSale();
    //$di->get('Product')->getTotalBill(1);
    Util::redirect("shop");
}
if(isset($_POST["place_order"])){
    $di->get('Cart')->deleteCartProductsByUser($_SESSION["user_id"]);
}
if(isset($_POST['search_query'])){
    // echo $_POST['search'];
    $_SESSION["search_query"]=$_POST['search'];
    Util::redirect("shop");
}
if(isset($_POST['chatbot'])){
    // echo $_POST['chatText'];
    $word = explode(" ",$_POST['chatText']);
    // print_r($word);
    $txt = $word[sizeof($word)-1];
    $products = $di->get("Database")->rawQuery("SELECT id,product_name,short_description from product where category_name like '%{$txt}%'");
    // print_r($products);
    echo json_encode($products);
}