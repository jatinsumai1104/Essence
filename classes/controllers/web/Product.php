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

    public function getProductById($id){
      return $this->di->get("Database")->readData($this->table, ["*"], "id={$id}")[0];
    }
}
?>