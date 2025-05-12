<?php
require_once '../../models/registeredUser.php';
require_once '../../controllers/AuthController.php';
require_once '../../models/client.php';
require_once '../../views/utils/alert.php';

if(session_status() === PHP_SESSION_NONE) 
  session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      AuthController::login($_POST['username'], $_POST['password']);
    }
    else {
      Alert::setAlert('danger', "Please fill up all fields!");
      header('location: ../../views/auth/login.php');
      exit;        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login - Mulitmedia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />
    <?php require_once '../utils/linkTags.php' ?>
  </head>

  <body>
    <?php Alert::renderAlert() ?>
    
    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner Start -->
      <?php require_once '../utils/spinner.php'?>
      <!-- Spinner End -->

      <!-- Sign In Start -->
      <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
          <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="../Shared/index.php">
                  <h3 class="text-primary">
                    Multimedia
                  </h3>
                </a>
                <h3>Sign In</h3>
              </div>

              <form action="login.php" method="POST"> 
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control text-main" id="floatingInput" placeholder="text" />
                  <label for="floatingInput">Username </label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" name="password" class="form-control text-main" id="floatingPassword" placeholder="Password" />
                  <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                  Sign In
                </button>
              </form>

              <p class="text-center mb-0">
                Don't have an Account? <a href="register.php">Sign Up</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <?php require_once '../utils/scripts.php' ?>
  </body>
</html>
