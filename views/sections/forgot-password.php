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

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <a href=""> -->
                <div class="col-lg-6 d-none d-lg-block " style="background: url(<?php echo BASEASSETS;?>img/product-img/product-1.jpg);
                  background-size: cover;"><a href="#"></a></div>
              <!-- </a> -->
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <button type ="submit" name="register_button" class="btn essence-btn" style="width: 100%">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo BASEPAGES?>register.php">Create an Account!</a>
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

    </div>

  </div>
  <?php
require_once(__DIR__.'/../includes/scripts.php')
?>