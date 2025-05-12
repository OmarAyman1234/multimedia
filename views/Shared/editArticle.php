
<?php
require_once '../../controllers/ArticleController.php';
require_once '../../models/registereduser.php';
require_once '../../models/article.php';
if(!isset($_SESSION)) {
  session_start();
}


$id = $_GET['id'];
if(!isset($_GET['id'])) {
  header('location: ../../views/Shared/404.php');
  exit;
}
$result = ArticleController::getArticle($id);
if(isset($_POST['title'])&&isset($_POST['content'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  if(ArticleController::updateArticle($id, $title, $content)) {
    header('location: ../../views/Shared/article.php?id='.$id);
    exit;
  } else {
    Alert::setAlert('danger', 'Error updating article');
  }
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
  <style>
    .card-edit {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      margin: auto;
      max-width: 800px;
      transform: translateY(-20px);
      transition: transform 0.3s ease;
    }
    .card-edit:hover {
      transform: translateY(-25px);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
    }
    /* Headings */
    .card-edit h2 {
      color: #2c3e50;
      font-weight: 700;
      letter-spacing: 1px;
    }
    /* Form Fields */
    .form-control,
    .form-select {
      border: none;
      border-bottom: 2px solid #d1d5db;
      border-radius: 0;
      padding: 0.5rem 0;
      background: transparent;
      transition: border-color 0.3s;
    }
    .form-control:focus,
    .form-select:focus {
      border-color: #4f46e5;
      box-shadow: none;
    }
    .form-label {
      font-size: 0.9rem;
      color: #6b7280;
      margin-bottom: 0.25rem;
    }
    .form-text {
      font-size: 0.8rem;
      color: #9ca3af;
    }
    .btn-primary {
      background-color: #4f46e5;
      border: none;
      border-radius: 50px;
      padding: 0.6rem 1.8rem;
      font-weight: 600;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #4338ca;
    }
    .btn-secondary {
      background-color: #e5e7eb;
      color: #374151;
      border: none;
      border-radius: 50px;
      padding: 0.6rem 1.8rem;
      font-weight: 600;
      transition: background-color 0.3s;
    }
    .btn-secondary:hover {
      background-color: #d1d5db;
    }
    /* Checkbox */
    .form-check-input {
      width: 1.2em;
      height: 1.2em;
      border-radius: 0.25em;
    }
  </style>
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">

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
  <div class="container py-5">
    <div class="card-edit">
      <h2 class="mb-4 text-center">Edit Article</h2>
      <form method="POST">
        <div class="mb-4">
          <label for="articleTitle" class="form-label">Title</label>
          <textarea class="form-control" id="articleTitle" rows="4" placeholder="Write your Title here..." name="title" required><?php echo $result->getTitle(); ?></textarea>
        </div>
        <div class="mb-4">
          <label for="articleContent" class="form-label">Content</label>
          <textarea class="form-control" id="articleContent" rows="8" placeholder="Write your article here..." name="content" required><?php echo $result->getContent();?></textarea>
        </div>
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
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
