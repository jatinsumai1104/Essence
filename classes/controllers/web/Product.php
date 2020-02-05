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
      return $this->di->get("Database")->readData($this->table, ["*"], "category_name= '$category_name'");
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

     //var_dump($product_ids);
  }
}
?>