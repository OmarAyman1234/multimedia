<?php 
require_once '../../controllers/DBController.php';
require_once '../../controllers/ArticleController.php';
require_once '../../models/article.php';
require_once '../../controllers/SearchController.php';
require_once '../../models/category.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
$title=$_POST['search'];
$article=SearchController::getArticleByTitle($title);
$articleId=$article->getId();
$category=SearchController::getCategoryByArticleId($articleId);
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
    .btn-outline-light:hover {
        background-color: #ffffff;
        color: #1a1a1a;
        transition: all 0.3s ease;
    }
    .card{
        
        transition: all 0.5s;
    }

    .card:hover {
        transform:scale(1.05);
        /* width: 1000px; */
        transition: all 0.5s;
        box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.95);
    }
</style>

</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
  

    <!-- Sidebar Start -->
    <?php require_once '../utils/sidebar.php'?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php require_once '../utils/nav.php'?>
      <!-- Navbar End -->
<!-- Sale & Revenue Start -->

<div class="row justify-content-center my-5">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background-color: #121212;">
            <!-- Article Image -->
            <img src="<?php echo $article->getImage(); ?>"
                 alt="<?php echo htmlspecialchars($article->getTitle()); ?>"
                 class="card-img-top"
                 style="height: 300px; object-fit: cover;">

            <!-- Card Body -->
            <div class="card-body text-white p-4">
                <!-- Article Title -->
                <h2 class="card-title mb-3 fw-bold">
                    <?php echo htmlspecialchars($article->getTitle()); ?>
                </h2>

                <!-- Category Badge -->
                <?php if (!empty($category[0]['name'])): ?>
                    <span class="badge rounded-pill text-bg-primary px-3 py-2 mb-3 text-uppercase fs-6 shadow-sm">
                        <?php echo htmlspecialchars($category[0]['name']); ?>
                    </span>
                <?php endif; ?>

                <!-- Article Snippet -->
                <p class="card-text lh-lg mb-4" style="opacity: 0.9;">
                    <?php echo htmlspecialchars(substr($article->getContent(), 0, 250)) . '...'; ?>
                </p>

                <!-- Read More Button -->
                <a href="article.php" class="btn btn-outline-light rounded-pill px-4 py-2 fw-semibold transition-all">
                    Read more →
                </a>
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
