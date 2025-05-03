<?php
require_once "../../models/registeredUser.php";
require_once "../../controllers/AuthControllers.php";
  if(isset($_POST['email']) && isset($_POST['uername']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
    if(!empty($_POST['email']) && !empty($_POST['uername']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
      if($_POST['password'] == $_POST['confirmPassword']){
        $newClient = new Client;
        $newClient->setEmail($_POST['email']);
        $newClient->setUsername($_POST['uername']);
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $newClient->setPassword(newPassword: $hashedPassword);
        $newClient->setRoleId(3);
        $authControl = new AuthControllers;
        if($authControl->register($newClient)){
          header("location: ../client/index.php");
        }
      }
      else{
        echo "Please check your password confirmation";
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
              <form methode="POST" action="register.php">
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name@example.com"
                    name = "email"
                  />
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="text"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Username"
                    name = "username"
                  />
                  <label for="floatingPassword">Username</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="password"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Password"
                    name = "password"
                  />
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="password"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Password"
                    name = "confirmPassword"
                  />
                  <label for="floatingPassword">Confirm Password</label>
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
                Already has account? <a href="signin.php">Sign in</a>
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
