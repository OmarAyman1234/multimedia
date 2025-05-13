<?php
require_once '../../controllers/ArticleController.php';
require_once '../../controllers/AuthController.php';
require_once '../../models/article.php';
require_once '../../models/registereduser.php';
require_once '../../models/category.php';
require_once '../../controllers/FeedController.php';

if(!isset($_SESSION)) {
  session_start();
}
$categories = FeedController::getAllCategory();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['title'])&&isset($_POST['content'])&&isset($_POST['category'])&&isset($_FILES['image'])){
  $editorId = $_SESSION['userId'];
  $article = new Article();
  $article->setTitle($_POST['title']); 
  $article->setContent($_POST['content']);
  $article->setCategoryId($_POST['category']);
  $article->setEditorId($editorId);

  $location='../../views/assets/img/'.$_FILES['image']['name'];
  if(move_uploaded_file($_FILES['image']['tmp_name'], $location)){
    $article->setImage($location);
  }
  else{
    echo "Error uploading image";
  }
  if(ArticleController::addArticle($article)){
    Alert::setAlert('success', "Article added successfully");
    header('location: ../../views/Shared/articles.php');
    exit;
  }
  else{
    Alert::setAlert('danger', "Error adding article");
  }
  
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
    .card {
      background-color: #1e1e1e;
      border: 1px solid #2c2c2c;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .card-header {
      background-color: #272727;
      color: #ffffff;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    .form-control,
    .form-select {
      background-color: #2c2c2c;
      color: #e0e0e0;
      border: 1px solid #444;
      border-radius: 0.8rem;
      transition: border-color 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
      background-color: #2c2c2c;
      border-color: #6f42c1;
      box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.25);
      color: #fff;
    }

    label {
      color: #bbbbbb;
    }

    .form-text {
      color: #888;
    }

    .btn-success {
      background-color: #6f42c1;
      border: none;
      border-radius: 0.8rem;
      transition: background-color 0.3s ease;
    }

    .btn-success:hover {
      background-color: #5a34a0;
    }

    .invalid-feedback {
      color: #ff6b6b;
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
 <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header text-center">
            <h4><i class="bi bi-file-earmark-plus"></i> Add New Article</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="../../views/Shared/index.php" enctype="multipart/form-data" id="article-form" novalidate>
              <div class="mb-3">
                <label for="title" class="form-label">Article Title</label>
                <input name='title' type="text" class="form-control" id="title" placeholder="Enter article title" required />
                <div class="invalid-feedback">Please provide a title for your article.</div>
              </div>
              <div class="mb-3">
                <label for="language" class="form-label">Category</label>
                <select name="category" id="category" class="form-select form-select-lg">
                <option selected disabled>Select a category</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category['id'] ?>">
                    <?= htmlspecialchars($category['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="mb-3">
                <label for="content" class="form-label">Article Content</label>
                <textarea name="content" class="form-control" id="content" rows="8" placeholder="Write your article..." required></textarea>
                <div class="invalid-feedback">Please write some content for the article.</div>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Upload Cover Image (Optional)</label>
                <input name="image" class="form-control" type="file" id="image" accept="image/*" />
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-success">
                  <i class="bi bi-upload"></i> Submit Article
                </button>
              </div>
            </form>
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
