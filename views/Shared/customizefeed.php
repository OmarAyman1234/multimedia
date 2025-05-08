<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once '../../controllers/ArticleController.php';
require_once '../../controllers/DBController.php';
require_once '../../controllers/FeedController.php';
$articles=FeedController::getAllArticles();
$categories=FeedController::getAllCategory();
if(isset($_POST['category'])){
  $_SESSION['category']=$_POST['category'];
  header("Location: index.php");
}
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

</head>
<style>
  .btn-cadetblue {
    background-color: #5f9ea0;
    color: white;
    border: none;
  }

  .btn-cadetblue:hover {
    background-color: #538c8d;
    color: white;
  }

  .custom-card {
    border-radius: 1rem;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
  }

  .form-select:focus {
    border-color: #5f9ea0;
    box-shadow: 0 0 0 0.2rem rgba(95, 158, 160, 0.25);
  }
</style>

<body>
  <div class="container-fluid position-relative d-flex p-0">

    <!-- Sidebar Start -->
    <?php require_once '../utils/sidebar.php' ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php require_once '../utils/nav.php' ?>
      <!-- Navbar End -->
      <!-- Sale & Revenue Start -->
      <div class="container py-5">
        <div class="row justify-content-center mb-4">
          <div class="col-auto">
            <h1 class="text-center text-cadetblue">Customize Your Feed</h1>
          </div>
        </div>

        <div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
      <form action="../Shared/customizefeed.php" method="post" class="gx-4 gy-3">
        <div class="card custom-card p-4">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Choose Your Category</h2>
            <p class="text-muted text-center mb-4 fs-5">Select one of the available categories to customize your feed.</p>

            <div class="mb-4">
              <label for="category" class="form-label fw-semibold fs-5">Available Categories:</label>
              <select name="category" id="category" class="form-select form-select-lg">
                <option selected disabled>Select a category</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category['id'] ?>">
                    <?= htmlspecialchars($category['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-cadetblue btn-lg rounded-pill">
                Submit
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <!-- JavaScript Libraries and Template JS -->
  <?php require_once '../utils/scripts.php' ?>
</body>

</html>