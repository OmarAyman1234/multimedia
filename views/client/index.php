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

      <!-- Article example start -->
      <div class="container-fluid mt-4">

        <!-- Title & Language Selection -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5">
          <h1 class="mb-3 mb-md-0 text-title">Article Title</h1>
          <div class="ms-md-auto" style="width: 160px;">
            <select class="form-select bg-dark text-white border-light" id="languageSelect">
              <option value="en" selected>English</option>
              <option value="ar">Arabic </option>
              <option value="fr">French</option>
            </select>
          </div>
        </div>

        <!-- Featured Article Image -->
        <div class="mb-4 border-1 border border-white rounded-1">
          <img src="../assets/img/cat4.jpg" alt="Article banner" class="img-fluid w-100 rounded shadow" style="max-height: 400px; object-fit: cover;">
        </div>

        <!-- Article content -->
        <article class="text-main">
          <h2 class="text-title">Subheading 1</h2>
          <p>Details about the first subtopic go here. This section elaborates on specific aspects of the article.</p>
          <h2 class="text-title">Subheading 2</h2>
          <p>More insights are provided in this section. You can continue expanding as needed.</p>
        </article>

        <!-- Meta Info at the end of the article -->
        <div class="d-flex flex-column align-items-center mt-4">
          <hr class="w-100" style="border-top: 3px solid white; margin-bottom: 20px;">
          <img src="../assets/img/user.jpg" alt="Author Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
          <p class="text-main mb-0">
            Published on May 1, 2025 by <strong>John Doe</strong>
          </p>
        </div>

      </div>
      <!-- Article example End -->

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
