<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once '../../controllers/ArticleController.php';
require_once '../../controllers/DBController.php';
$mark = 0;
$art = new ArticleController;
$articles = $art->getAllArticles();
$categories=$art->getCategory();
if(isset($_POST['category'])){
  if(!empty($_POST['category'])){
    $categoryId = $_POST['category'];
    $catarticles = $art->getArticlesByCategory($categoryId);
    $mark = 1;
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

</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <?php require_once '../utils/spinner.php' ?>
    <!-- Spinner End -->

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

        <div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6">
      <form action="../Shared/customizefeed.php" method="post" class="gx-4 gy-3">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Choose your Category</h5>
            <p class="text-muted">Available Categories:</p>
            <div class="row">
              <div class="col-6">
                <select name="category" class="form-select" aria-label="Default select example">
                  <option selected disabled>Select a category</option>
                  <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>">
                      <?= htmlspecialchars($category['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-cadetblue btn-lg px-5">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>



      <div class="container py-5">
        <div class="row mb-4">
          <div class="col text-center">
            <h1 class="display-4 text-cadetblue">The Blog</h1>
          </div>
        </div>

        <?php 
        if($mark == 0){
$count = 0;
foreach ($articles as $article) {
    if ($count % 3 == 0) {
        echo '<div class="row mb-4">';
    }
    ?>
    
    <div class="col-12 col-md-4">
        <div class="card h-100 shadow-sm">
            <img  src="<?php echo $article["image"] ?>"
                class="card-img-top" alt="<?php echo $article["title"] ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $article["title"] ?></h5>
                <p class="card-text flex-grow-1">
                    <?php echo substr($article["content"], 0, 100) . '...' ?>
                </p>
                <a href="#" class="mt-3 align-self-start">Read more →</a>
            </div>
        </div>
    </div>

    <?php
    $count++;
    if ($count % 3 == 0) {
        echo '</div>';
    }
}
if ($count % 3 != 0) {
    echo '</div>';
}
         }else{
           $count = 0;
 foreach ($catarticles as $article) {
     if ($count % 3 == 0) {
         echo '<div class="row mb-4">';
     }
     ?>
    
     <div class="col-12 col-md-4">
         <div class="card h-100 shadow-sm">
             <img  src="<?php echo $article["image"] ?>"
                 class="card-img-top" alt="<?php echo $article["title"] ?>" style="height: 200px; object-fit: cover;">
             <div class="card-body d-flex flex-column">
                 <h5 class="card-title"><?php echo $article["title"] ?></h5>
                 <p class="card-text flex-grow-1">
                     <?php echo substr($article["content"], 0, 100) . '...' ?>
                 </p>
                 <a href="#" class="mt-3 align-self-start">Read more →</a>
             </div>
         </div>
    </div>

     <?php
    $count++;
    if ($count % 3 == 0) {
        echo '</div>';
    }
}
if ($count % 3 != 0) {
    echo '</div>';
}
        }
        

 ?>
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