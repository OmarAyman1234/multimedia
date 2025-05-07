<?php
session_start();
require_once "../../models/registeredUser.php";
require_once "../../controllers/AuthController.php";
require_once "../../controllers/ArticleController.php";
require_once "../../models/client.php";
if (isset($_POST['username']) && isset($_POST['password'])){
  if (!empty($_POST['username']) && !empty($_POST['password'])){
       if($_POST['password'] == $_POST['confirmPassword']){
        $newClient = new Client;
        $newClient->setEmail($_POST['email']);
        $newClient->setUsername($_POST['username']);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $newClient->setPassword(newPassword: $hashedPassword);
        $newClient->setRoleId(3);
        AuthController::registerController($newClient);
      }
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

  <!-- Link to external CSS stylesheets -->
  <?php require_once '../utils/linkTags.php' ?>
  </head>

  <body>
    <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <?php require_once '../utils/spinner.php'?>
    <!-- Spinner End -->

      <!-- Sign In Start -->
      <div class="container-fluid">
        <div
          class="row h-100 align-items-center justify-content-center"
          style="min-height: 100vh"
        >
          <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
              <div
                class="d-flex align-items-center justify-content-between mb-3"
              >
                <a href="index.html" class="">
                  <h3 class="text-primary">
                    Multimedia
                  </h3>
                </a>
                <h3>Register</h3>
              </div>
              <form method="POST" action="register.php">
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="name@example.com"
                    name = "email"
                    id = "floatingInput"
                  />
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Username"
                    name = "username"
                    id="floatingUsername"
                  />
                  <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                    id="floatingPassword"                  
                    name = "password"
                  />
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                    name = "confirmPassword"
                    id = "floatingConfirmPassword"
                  />
                  <label for="floatingConfirmPassword">Confirm Password</label>
                </div>
                <div
                  class="d-flex align-items-center justify-content-between mb-4"
                >
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="exampleCheck1"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                      >Check me out</label
                    >
                  </div>
                  <a href="">Forgot Password</a>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                  Register
                </button>
            </form>
              <p class="text-center mb-0">
                Already has account? <a href="login.php">Sign in</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Sign In End -->
    </div>

  <!-- JavaScript Libraries and Template JS -->
  <?php require_once '../utils/scripts.php' ?>
  </body>
</html>
