<?php

Class User{
    protected $di;
    protected $table = "users";
    public function __construct($di){
        $this->di = $di;
    }

    public function getRecommendCategories($id){
    $categories = $this->di->get("Database")->rawQuery("SELECT category_name from user_category WHERE user_id={$id}");
    // print_r($categories);
    return $categories;
    }

    public function getUserCountry($id){
        return $this->di->get("Database")->readData($this->table, ["country"], "id=".$id)[0]["country"];
    }
}
?>