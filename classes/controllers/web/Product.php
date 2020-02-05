<?php

Class Product{
    protected $di;
    protected $table = "product";
    public function __construct($di){
        $this->di = $di;
    }

    public function readAllProducts(){
      return $this->di->get("Database")->readData($this->table);
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

  
}
?>