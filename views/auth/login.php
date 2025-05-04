<?php
require_once '../../models/registeredUser.php';
require_once '../../controllers/AuthController.php';
require_once '../../models/client.php';


session_start();

$errmsg = ""; 

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $registeredUser = new Client();
        $registeredUser->setUsername($_POST['username']);
        $registeredUser->setPassword($_POST['password']);

        $auth = new AuthController();
        $loginSuccess = $auth->login($registeredUser);

        if ($loginSuccess) {
           
            if (isset($_SESSION["roleId"])) {
                if ($_SESSION["roleId"] == 1) {
                    header("location: ../client/blank.php");
                    exit();
                } elseif ($_SESSION["roleId"] == 2) {
                    header("Location: ../client/index.php");
                    exit();
                } else {
                    header("Location: ../client/index.php");
                    exit();
                }
            } else {
                $errmsg = "Role ID ";
            }
        } else {
            $errmsg = $_SESSION["errmsg"] ?? "Login failed. Please try again.";
        }
    } else {
        $errmsg = "Please fill all fields.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />
    <?php require_once '../utils/linkTags.php' ?>
  </head>

  <body>
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
                <a href="index.html">
                  <h3 class="text-primary">
                    <i class="fa fa-user-edit me-2"></i>DarkPan
                  </h3>
                </a>
                <h3>Sign In</h3>
              </div>

              <form action="login.php" method="POST"> 
  <div class="form-floating mb-3">
    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="text" />
    <label for="floatingInput">Username </label>
  </div>
  <div class="form-floating mb-4">
    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" />
    <label for="floatingPassword">Password</label>
  </div>
 

              
                
                
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <a href="">Forgot Password</a>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                  Sign In
                </button>
              </form>
           

              <p class="text-center mb-0">
                Don't have an Account? <a href="">Sign Up</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <?php require_once '../utils/scripts.php' ?>
  </body>
</html>
