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
}
?>