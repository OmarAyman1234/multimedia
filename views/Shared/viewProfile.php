<?php

require_once '../../controllers/ProfileController.php';
require_once '../../models/client.php';


if(session_start() === PHP_SESSION_NONE){ 
    session_start();
}  
$id = $_GET['id'] ?? null;

$user = ProfileController::fetchProfileData($id);



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Article page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />
  <link rel="stylesheet" href="">
  <!-- Link to external CSS stylesheets -->
  <?php require_once '../utils/linkTags.php' ?>
  <style>
    .profile-card {
  background-color: #2c2f3f;
  border-radius: 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.profile-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 20px rgba(13, 110, 253, 0.3);
}

.profile-image img {
  width: 140px;
  height: 140px;
  object-fit: cover;
  border: 4px solid #0d6efd;
  transition: transform 0.3s ease;
}

.profile-image img:hover {
  transform: scale(1.05);
}

  </style>
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <?php require_once '../utils/spinner.php'?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require_once '../utils/sidebar.php'?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php require_once '../utils/nav.php'?>
      <!-- Navbar End -->
<!-- Sale & Revenue Start -->
 <!-- User Profile Page -->
<div class="container-fluid pt-4 px-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="profile-card bg-secondary text-center text-light p-5 rounded shadow">
        <!-- Heading -->
        <h3 class="text-primary mb-4">
          <i class="fa fa-user-circle me-2"></i>User Profile
        </h3>

        <!-- Profile Photo -->
        <div class="profile-image mb-4">
          <img src="<?= $user[0]['profilePicture'] ?>" alt="Profile Picture" class="rounded-circle shadow">
        </div>

        <!-- User Info -->
        <div class="row justify-content-center">
          <div class="col-md-5 mb-3">
            <label class="form-label fw-semibold">User name</label>
            <div class="form-control bg-dark border-0 text-light" readonly><?= $user[0]['username'] ?></div>
          </div>
          <div class="col-md-5 mb-3">
            <label class="form-label fw-semibold">Role Name</label>
            <div class="form-control bg-dark border-0 text-light" readonly><?= $user[0]['roleName'] ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sale & Revenue end-->
      <!-- Footer Start -->
      <?php require_once '../utils/footer.php' ?>
      <!-- Footer End -->

    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <!-- JavaScript Libraries and Template JS -->
  <?php require_once '../utils/scripts.php' ?>
</body>
</html>
