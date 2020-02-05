<?php
class Specialization{
    protected $di;
    protected $table = "specialiazations";
    public function __construct($di){
        $this->di = $di;
    }

    public function doctorsList($disease){
        $sql = "SELECT * FROM {$this->table} WHERE name = '$disease'";
        return $this->di->get("Database")->rawQuery($sql);
    }

}
?>