<?php
class UserSpecific{
    protected $di;
    private $table;
    public function __construct($di){
        $this->di = $di;
    }
    public function birthday($user_id){
        try{
            $this->di->get("Database")->beginTransaction();
            $sql = "SELECT DOB FROM users WHERE id = $user_id";
            $res = $this->di->get("Database")->rawQuery($sql);
            $this->di->get("Database")->commit();
            return $res[0]['DOB'];
        }catch(Exception $e){
            $this->di->get("Database")->rollback();
            print_r($e);
        }
    }

    public function isBirthDay($user_id){
        $dob = $this->birthday($user_id);
        $date_today = date("Y-m-d");
        $date_today = date_create($date_today);
        $dob_date = date_create($dob);
        $res = date_diff($date_today,$dob_date);
        $res = $res->days%365;
        if($res >= 355){
            return true;
        }
        return false;
    }

}

?>