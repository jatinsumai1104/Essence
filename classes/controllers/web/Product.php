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
}
?>