<?php

class Appointment{
    protected $di;
    protected $table = "appointment";
    public function __construct($di){
        $this->di = $di;
    }

    public function setAppointment($doctor_id , $patient_id){
        // $sql = "INSERT INTO appointments('doctor_id','patient_id','date_of_appointment') VALUES('$doctor_id','$patient_id',now())";
        $data['doctor_id'] = $doctor_id;
        $data['patient_id'] = $patient_id;
        $data['date_of_appointment'] = date("Y");
        return $this->di->get("Database")->insert($this->table, $data);
    }
}

?>