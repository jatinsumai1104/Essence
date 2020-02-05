<?php

Class Patient{
    protected $table = "patient";
    protected $di;
    public function __construct($di){
        $this->di = $di;
    }


    public function registerHalfPatient($data){
      try{
        $dataURL = $data["image"];
        $dataURL = str_replace('data:image/png;base64,', '', $dataURL);
        $dataURL = str_replace(' ', '+', $dataURL);
        $data["image"] = base64_decode($dataURL);
        unset($data["patient_register_through_doctor"]);
        $this->di->get("Database")->beginTransaction();

        $id = $this->di->get("Database")->insert("users", $data);
        $id = $this->di->get("Database")->insert($this->table, ["user_id"=>$id]);

        $this->di->get("Database")->commit();
        echo "success";
      }catch(Exception $e){
        $this->di->get("Database")->rollback();
        echo $e;
      }
      
    }

    public function getPatientFromVoice($data){
      $data = explode(" ", $data["voice_text"]);
      $str = "";
      foreach($data as $name){
        $str .= " or name Like '%".$name."%' ";
      }

      $query = "SELECT * FROM `users` WHERE ".substr($str, 3);
      return $this->di->get("Database")->rawQuery($query);
    }

    public function getPreviousRecords($patient_id){
      $query = "SELECT * FROM prescription,cases WHERE cases.patient_id = $patient_id AND prescription.case_id = cases.id";
      $res = $this->di->get("Database")->rawQuery($query);
      return $res;
    }

    public function getPatientData($doctor_id, $patient_id){
      
      $query = "SELECT DISTINCT pc.id as unique_id, u.name, u.gender, u.email, FLOOR(DATEDIFF(CURDATE(), dob)/365.25) as age, u.image, CURDATE() as today, pc.* FROM patient as p INNER JOIN users as u ON p.user_id = u.id INNER JOIN doctor_patient as dp ON dp.doctor_id = {$doctor_id} INNER JOIN cases as c ON c.patient_id = p.id INNER JOIN prescription as pc ON pc.case_id = c.id WHERE p.id = {$patient_id}";
      $res = $this->di->get("Database")->rawQuery($query);
      $res["doctor_details"] = $this->di->get("Doctor")->getDoctorData($doctor_id);
      return $res;
    }
}