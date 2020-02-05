<?php
require_once(__DIR__.'/../includes/header.php')
?>
<style>
input{
  height: 42px;
    border: 1px solid #ebebeb;
    background-color: transparent;
    border-radius: 0;
}
</style>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block " style="background: url(<?php echo BASEASSETS;?>img/product-img/product-3.jpg);
    background-size: cover;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="../../helper/routing.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="first_name" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="last_name" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repeat_password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <select name="select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                
                <button type ="submit" name="register_button" class="btn essence-btn" style="width: 100%">
                  Register Account
                </button>
                <hr>
                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <div class="text-center">
                <a class="small" href="<?php echo BASEPAGES?>forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo BASEPAGES?>login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php
require_once(__DIR__.'/../includes/scripts.php')
?>