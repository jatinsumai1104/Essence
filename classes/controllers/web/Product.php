<?php

Class Cart{
    protected $di;
    protected $table = "product";
    public function __construct($di){
        $this->di = $di;
    }

    public function readAllProducts(){
      $this->di->get("Database")->readData($this->table);
    }
}
?>