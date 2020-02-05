<?php

class Event{

    protected $di;
    private $table = "events";

    public function __construct($di){
        $this->di = $di;
    }

    public function insert($values){
        try{
            $this->di->get("Database")->beginTransaction();
            $table = ["name","country","category","discount"];
            $this->di->get("Database")->insert($table,$values);
            $this->di->get("Database")->commit();
        }catch(Exception $e){
            print_r($e);
            $this->di->get("Database")->rollback();
        }
    }


    public function getEventCategory($country_name){
        $sql = "SELECT category FROM events WHERE country LIKE '%$country_name%' LIMIT 1";
        
        $res = $this->di->get("Database")->rawQuery($sql);
        
        $res = explode(",",$res[0]['category']);

        $this->di->get("Database")->commit();

        return $res;
    }

    public function getProductsForEvents($country_name){
        $category = $this->getEventCategory($country_name);
        $result = [];
        for($i=0;$i<count($category);$i++){
            $cat = $category[$i];
            $sql = "SELECT * FROM product WHERE category_name LIKE '%$cat%' LIMIT 5";
            $res = $this->di->get("Database")->rawQuery($sql);
            $result = array_merge($result,$res);    
        }
        return $result;
    }

    public function getProductsForBday($user_id){
        if($this->di->get("UserSpecific")->isBirthDay()){
            $category = $this->getEventCategory("birthday");
            $result = [];
            for($i=0;$i<count($category);$i++){
                $cat = $category[$i];
                $sql = "SELECT * FROM product WHERE category_name LIKE '%$cat%' LIMIT 5";
                $res = $this->di->get("Database")->rawQuery($sql);
                $result = array_merge($result,$res);    
            }
            return $result;
        }else{
            return [];
        }
        
    }
}

?>