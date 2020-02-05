<?php

Class Category{
    protected $di;
    protected $table = "category_user";
    public function __construct($di){
        $this->di = $di;
    }

    public function getCategoryUsers($category_name){
        $array_ids = $this->di->get("Database")->rawQuery("SELECT user_ids FROM `category_user` WHERE category_name='{$category_name}'");
        // print_r($array_ids[0]);
        $user_ids = explode(",",$array_ids[0]['user_ids']);
        
        foreach($user_ids as $k=>$user_id){
            // echo $_SESSION['user_id'];
            if($user_id == $_SESSION['user_id']){
                unset($user_ids[$k]);
            }
        }
        // print_r($user_ids);


        $product_ids = Array();
        if(sizeof($user_ids)!=0){
            foreach($user_ids as $user_id){
            $ans = $this->di->get("Database")->rawQuery("SELECT product_id from cart where user_id={$user_id} AND category='{$category_name}'");
            foreach($ans as $an){
                array_push($product_ids,$an['product_id']);
            }
            // print_r($ans);
            }
            $product_ids = array_unique($product_ids);
        }else{
            $ans = $this->di->get("Database")->rawQuery("SELECT id from product where category_name='{$category_name}'");
            print_r($ans);
            foreach($ans as $an){
                array_push($product_ids,$an['product_id']);
            }
        }

        return $product_ids;



    }
}
?>