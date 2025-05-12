<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Article page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

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

    <!-- Sidebar Start -->
    <?php require_once '../utils/sidebar.php'?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php require_once '../utils/nav.php'?>
      <!-- Navbar End -->

              <!-- 404 Start -->
          <div class="container-fluid pt-4 px-4">
          <div
            class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0"
          >
            <div class="col-md-6 text-center p-4">
              <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
              <h1 class="display-1 fw-bold">404</h1>
              <h1 class="mb-4">Page Not Found</h1>
              <p class="mb-4">
                We’re sorry, the page you have looked for does not exist in our
                website! Maybe go to our home page or try to use a search?
              </p>
              <a class="btn btn-primary rounded-pill py-3 px-5" href="index.php"
                >Go Back To Home</a
              >
            </div>
          </div>
        </div>
        <!-- 404 End -->

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
