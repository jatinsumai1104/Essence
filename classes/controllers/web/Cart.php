<?php

Class Cart{
    protected $di;
    protected $table = "cart";
    public function __construct($di){
        $this->di = $di;
    }

    public function addToCart($data){
        try {
            // Begin Transaction
            $this->di->get("Database")->beginTransaction();
            $assoc_array["product_id"] = $data["product_id"];
            $assoc_array["quantity"] = $data["quantity"];
            $assoc_array["user_id"] = Session::getSession("user_id");
            $assoc_array["category"] = $data["category"];
            $cart_id = $this->di->get("Database")->insert($this->table, $assoc_array);
            $this->di->get("Database")->commit();
            // end transaction
            Session::setSession("add", "Add to cart successfully");
        } catch (Exception $e) {
            $this->di->get("Database")->rollback();
            Session::setSession("add", "Add to cart failed");
        }
    }

    
    public function addCategoryUser($data){
        try {
            // Begin Transaction
            $this->di->get("Database")->beginTransaction();
            $product_id = $data["product_id"];
            $query="SELECT category_name as cn from product WHERE id={$product_id}";
            $category_name = $this->di->get("Database")->rawQuery($query)[0];
            $query = "SELECT user_ids from category_user WHERE category_name like'%{$category_name}%'";
            $res = $this->di->get("Database")->rawQuery($query);
            $user_id = Session::getSession("user_id");
            if(count($res) > 0 ){
                $user_ids = $res[0];
                $user_ids.=",{$user_id}";
                $query  = "UPDATE category_name set user_ids={$user_ids} WHERE category_name like'%{$category_name}%'";
                $category_user_id = $this->di->get("Database")->rawQuery($query);
            }else{
                $user_ids =  $user_id;
                $user_ids.=",";
                $assoc_array = [];
                $assoc_array["category_name"] = $category_name;
                $assoc_array["user_ids"] = $user_ids;
                $category_user_id = $this->di->get("Database")->insert("category_user", $assoc_array);
            }
            $assoc_array = [];
            $assoc_array["user_id"] = $user_id;
            $assoc_array["category_name"] = "";
            $category_user_id = $this->di->get("Database")->insert("user_category", $assoc_array);
            $this->di->get("Database")->commit();
            // end transaction
            
        } catch (Exception $e) {
            $this->di->get("Database")->rollback();
            
        }
    }
    
}
?>