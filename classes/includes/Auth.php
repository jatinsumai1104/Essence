<?php

require_once(__DIR__."/../../helper/requirements.php");
class Auth {

    protected $di;
    

    protected $table = 'users';

    public function __construct(DependencyInjector $di){
        $this->di = $di;
    }

    // public function build() {
    //     return $this->di->get("Database")->query(
    //     "CREATE TABLE IF NOT EXISTS users(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, email VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(20) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL)"
    //     );
    // }

    public function create($data)
	{
		if(isset($data['password']))
		{
			$data['password'] = $this->di->get("Hash")->make($data['password']);
		}

		return $this->di->get("Database")->table($this->table)->insert($data);
    }
    
    public function signIn($data){
      $user = $this->di->get("Database")->table($this->table)->where('username', '=', $data['username']);

      if($user->count())
      {
        $user = $user->first();

        if($this->di->get("Hash")->verify($data['password'], $user->password))
        {
          $this->setAuthSession($user->id);

          return true;
        }
      }

      return false;
    }



    public function updateUserPassword(string $token, string $password){
        $password=$this->di->get("Hash")->make($password);
        return $this->di->get("Database")->query( "update users, tokens
        set users.password = '$password', tokens.expires_at= NOW() 
        where users.id = tokens.user_id and tokens.token = '$token'");
    }
    

    //to be updated
    public function signout(){
		  unset($_SESSION[$this->session]);
    }
    
    public function register($input){
      $email = $input['email'];
      $password = $input['password'];
      $repeat_password = $input['repeat_password'];

      $validator = $this->di->get("Validator");
      $validation = $validator->check($input, [
          'email' => [
              'required' => true,
              'maxlength' => 200,
              'unique' => 'employees',
              'email' => true
          ],
          'password' => [
              'required' => true,
              'minlength' => 5
          ]
      ]);

      if($validation->fails())
      {
        Session::setSession("sign_up", "fail");
        echo '<pre>', print_r($validation->errors()->all(), true), '</pre>';
      }
      else
      {
          // CODE TO BE EXECUTED IF THE VALIDATION HAS NO ERRORS
          $hashed_password = $this->di->get("Hash")->make($password);
  
          $data = ['block_no','street','city','pincode','state','country','state','country','town'];
          $insertion_array = Util::createAssocArray($data,$input);
          $address_id = $this->di->get("Database")->insert('address', $insertion_array);

          $input['password_hash'] = $hashed_password;
          $input['address_id'] = $address_id;

          $data = ['first_name','last_name','email','password_hash','phone_no','gender','address_id'];
          $insertion_array2 = Util::createAssocArray($data,$input);
          $this->di->get("Database")->insert('employees', $insertion_array2);
      }
      Session::setSession("sign_up", "success");
    }

    public function login($input){
      $email = $input['email'];
      $password = $input['password'];
      // $this->di->get("Database")->beginTransaction();

      if(!$this->di->get("Database")->exists("users",["email"=>$email])){
        Session::setSession("login", "Login employee_already_present error");
        Util::redirect("login");
      }else{
        $hashed_password =$this->di->get("Database")->readData("users",["password"],"email='{$email}'");
        $db_password = $hashed_password[0]['password'];
        // die($db_password . "     " .$hashed_password);
        if($this->di->get("Hash")->verify($password,$db_password)){
          $user_id = $this->di->get("Database")->readData("users",["id"],"email='{$email}'")[0]['id'];
          // var_dump($user_type);
          $id = $this->di->get("Database")->readData("users",["id"],"email='{$email}'")[0]["id"];
          Session::setSession("user_id",$id);
          Session::setSession("login","Login User success");
          Util::redirect("");
        }else{
          Session::setSession("login","Login Incorrect_username/password error");
          Util::redirect("login");
        }
      }
    }
}
