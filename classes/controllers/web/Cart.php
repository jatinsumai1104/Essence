<?php

Class Cart{
    protected $di;
    protected $table = "cart";
    public function __construct($di){
        $this->di = $di;
    }

    public function addToCart($data){
        try {
            $this->di->get("Database")->beginTransaction();
            $assoc_array["product_id"] = $data["product_id"];
            $assoc_array["quantity"] = $data["quantity"];
            $assoc_array["user_id"] = Session::getSession("user_id");
        $query="SELECT category_name as cn from product WHERE id={$data["product_id"]}";
            $category_name = $this->di->get("Database")->rawQuery($query)[0];
            $category_name = $category_name["cn"];
            $assoc_array["category"] = $category_name;
            $cart_id = $this->di->get("Database")->insert($this->table, $assoc_array);
            $this->di->get("Database")->commit();
            // end transaction
            Session::setSession("add", "Add to cart successfully");
        } catch (Exception $e) {
            echo $e;
            $this->di->get("Database")->rollback();
            Session::setSession("add", "Add to cart failed");
        }
    }


    public function isPriceUpdated($user_id){
        try{
            $sql = "SELECT * FROM cart WHERE user_id = $user_id";
            $res = $this->di->get("Database")->rawQuery($sql);
            $stat = "";
            for($i=0;$i<count($res);$i++){
                $val = $res[$i]['product_id'];
                if($i < count($res)-1){
                     $stat = $stat . " id ='$val' OR";
                }else{
                    $stat = $stat . " id = '$val'";
                }
            }
            $sql = "SELECT * FROM product WHERE" .$stat;
            $res = $this->di->get("Database")->rawQuery($sql);

            $products = [];
            for($i=0;$i<count($res);$i++){
                $dt = explode(" ",$res[$i]['updated_at']);
                if($dt[0] == date("Y-m-d")){
                    array_push($products,$res[$i]);
                }
            }
            return $products;   

        }catch(Exception $e){
            print_r($e);
        }
        

    }
    
    public function addCategoryUser($data){
        try {
            // Begin Transaction
            $this->di->get("Database")->beginTransaction();
            $product_id = $data["product_id"];
            $query="SELECT category_name as cn from product WHERE id={$product_id}";
            $category_name = $this->di->get("Database")->rawQuery($query)[0];
            $category_name = $category_name["cn"];
            $query = "SELECT user_ids from category_user WHERE category_name like'%{$category_name}%'";
            $res = $this->di->get("Database")->rawQuery($query);
            
            $user_id = Session::getSession("user_id");
            if(count($res) > 0 ){
                $user_ids = $res[0]["user_ids"];
               
                $arr_user_ids = explode(",",$user_ids);
                if(!in_array($user_id,$arr_user_ids)){
                    
                    $user_ids.=",{$user_id}";
                    
                $query  = "UPDATE category_user set user_ids='$user_ids' WHERE category_name like '%$category_name%'";
                
                 $this->di->get("Database")->query($query);
                }

                $query = "SELECT * FROM user_category WHERE user_id={$user_id} and category_name like '%$category_name%'";
                
                $res = $this->di->get("Database")->rawQuery($query);
                    if(!(count($res) > 0)){
                        $assoc_array["user_id"] = $user_id;
                    $assoc_array["category_name"] = $category_name;
                    //var_dump($assoc_array);
                    $category_user_id = $this->di->get("Database")->insert("user_category", $assoc_array);
                    }
                
                
            }else{
                $user_ids =  $user_id;
                $assoc_array = [];
                $assoc_array["category_name"] = $category_name;
                $assoc_array["user_ids"] = $user_ids;
                $category_user_id = $this->di->get("Database")->insert("category_user", $assoc_array);
                $assoc_array = [];
                $assoc_array["user_id"] = $user_id;
                $assoc_array["category_name"] = $category_name;
                $category_user_id = $this->di->get("Database")->insert("user_category", $assoc_array);
            }
            
            $this->di->get("Database")->commit();
            // end transaction
            
        } catch (Exception $e) {
            echo $e;
            $this->di->get("Database")->rollback();
            
        }
    }


    public function getAllCartProducts($id){
        $query = "SELECT c.*, p.product_name, p.category_name, p.price, p.image FROM cart as c INNER JOIN product as p on c.product_id = p.id where c.user_id = $id";
        $res = $this->di->get("Database")->rawQuery($query);
        $res["total_price"] = $this->di->get("Product")->getTotalBill($id);
        return $res;
    }

    public function deleteProductFromCart($data){
        //var_dump($data);
        $query = "DELETE FROM {$this->table} WHERE product_id = {$data['product_id']}";
        //echo $query;
        $this->di->get("Database")->query($query);
    }
    public function deleteCartProductsByUser($id){
        $query = "DELETE from cart WHERE user_id={$id}";
        if($res = $this->di->get("Database")->query($query)){
            Session::setSession("order","Order Placed success");
            Util::redirect("shop");
        }

    }
    
}
?>