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
            <div class="col-lg-6 d-none d-lg-block " style="background: url(<?php echo BASEASSETS;?>img/product-img/product-5.jpg);
    background-size: cover;"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <form method="post" class="user" action="<?php echo BASEPAGES?>../../helper/routing.php">
                  <input type="hidden" name="csrf_token" id="csrf_token" value=<?php echo Session::getSession("csrf_token");?>>
                  <div class="form-group">
                    <input type="email" required="true" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                    <input type="password" required="true" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                  </div>
                  <button type="submit" name="login_details" class="btn essence-btn" style="width: 100%">
                    Login
                  </button>
                  <hr>
                  <a href="index.html" class="btn essence-btn" style="width: 100%">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                  </a>
                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                  </a>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?php echo BASEPAGES?>forgot-password.php">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?php echo BASEPAGES?>register.php">Create an Account!</a>
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