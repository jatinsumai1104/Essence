<?php

Class Cart{
    protected $di;
    protected $table = "cart";
    public function __construct($di){
        $this->di = $di;
    }

    public function addToCart($data){
        
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
}
?>