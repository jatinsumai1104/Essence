<?php

Class Product{
    protected $di;
    protected $table = "product";
    public function __construct($di){
        $this->di = $di;
    }

    public function readAllProducts(){
      return $this->di->get("Database")->rawQuery("SELECT * from product ORDER BY category_name");
    }

    public function getProductByCategory($category_name){
      return $this->di->get("Database")->readData($this->table, ["*"], "category_name like '%$category_name%'");
    }

    public function getProductById($id){
      return $this->di->get("Database")->readData($this->table, ["*"], "id={$id}")[0];
    }

    public function getAllSellers(){
      return $this->di->get("Database")->readData($this->table, ["seller_name"]);
    }

    public function bestSeller(){
      $sql = "SELECT AVG(rating) AS rate,product_id FROM review GROUP BY product_id ORDER BY rate DESC LIMIT 5";
      $res = $this->di->get("Database")->rawQuery($sql);
      $stat = "";
      for($i =0;$i<count($res);$i++){
        $val = $res[$i]["product_id"];
        if($i<count($res)-1){
          $stat = $stat . " id = $val OR";
        }else{
          $stat = $stat . " id = $val";
        }
      }
      $sql = "SELECT * FROM product WHERE".$stat;
      $res = $this->di->get("Database")->rawQuery($sql);
      return $res;
    }
    public function getAllProductsOnSale(){
      $query = "SELECT category from events WHERE name = 'BBD'";
      $res = $this->di->get("Database")->rawQuery($query);
      $res = $res[0];
      
      $category_names = explode(",",$res["category"]);
      
      $product_ids = [];
      foreach($category_names as $category_name){
      $query = "SELECT product.id from product WHERE product.category_name like '%$category_name%'";
      
      $res = $this->di->get("Database")->rawQuery($query);
      
          foreach($res as $key=>$value){
             
              array_push($product_ids,$value["id"]);
              
          }
      }
      return $product_ids;

     //var_dump($product_ids);
  }

  public function getTotal($product_id){
    $query = "SELECT price FROM product WHERE id={$product_id}";
    $res = $this->di->get("Database")->rawQuery($query);
    $res = $res[0];
    //var_dump ($res);
    $res = $res["price"] - $res["price"]*15/100;
    //echo $res;
    return $res;
  }

  public function getTotalBill($user_id){
    $query= "SELECT p.id,p.price,c.quantity FROM cart as c INNER JOIN product as p on c.product_id = p.id where c.user_id = $user_id";
    $res = $this->di->get("Database")->rawQuery($query);
    $total_price = 0;
    $product_ids = $this->getAllProductsOnSale();
    foreach($res as $key => $value){
      if(in_array($value["id"],$product_ids)){
        $total_price += ($this->getTotal($value["id"])*$value["quantity"]);
      }else{
        $total_price+=($value["price"]*$value["quantity"]);
      }
    }
    //var_dump($value["quantity"]);
    //var_dump($res);

    return $total_price;
  }

  public function getReviewByProductId($id){
    // echo $id;
    $query = "SELECT * from review inner join users on review.user_id=users.id where product_id={$id}";
    $res = $this->di->get("Database")->rawQuery($query);
    // print_r($res);
    return $res;
  }

  public function boughtTogether($product_id){
    $sql = "SELECT also_bought_with FROM mapping_table WHERE product_id = $product_id";
    $res = $this->di->get("Database")->rawQuery($sql);
    if(isset($res[0])){
      $str = explode(",",$res[0]['also_bought_with']);
      $stat = "";
      for($i=0;$i<count($str);$i++){
        $val = $str[$i];
        if($i<count($str)-1){
          $stat = $stat . " id = $val OR";
        }else{
          $stat = $stat . " id = $val";
        }
        
      }
      $sql = "SELECT * FROM product WHERE".$stat;
      $res = $this->di->get("Database")->rawQuery($sql);
      return $res;
    }else{
      return [];
    }
  }

  
}
?>