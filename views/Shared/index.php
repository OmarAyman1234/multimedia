<?php
session_start();


// require_once "../../controllers/AuthController.php";
// require_once "../../models/client.php";
require_once "../../controllers/ProfileController.php";
require_once "../../models/article.php";
require_once "../../models/category.php";
$rl=0;
if(isset($_SESSION["userId"])){
    $rl= $_SESSION["userId"];

}

$articles=article::getAllArticles();
$articlesShuffeld=article::getShuffledArticles($articles);
$categories=category::getAllCategory();

if(isset($_SESSION['category'])){
  $mark = 1;
  $category=new category();
  $category->setId($_SESSION['category']);
  $catarticles = $category->getArticlesByCategory($category);
}
else{
  $mark = 0;
}
// $user=ProfileController::fetchProfileData($_SESSION['userId']);
// $_SESSION['profilePicture'] = $user[0]['profilePicture'];

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
  <link rel="stylesheet" href="../assets/css/main.css">
  <?php require_once '../utils/linkTags.php' ?>
  <style>
.row .card {
  display: flex;
  flex-direction: column;
  height: 100%;
}
.row .card-img-top {
  height: 300px;
  object-fit: cover;
}
.row .card-body {
  flex: 1;
  display: flex;
  flex-direction: column;
}
.row .card-body .card-title {
  margin-bottom: auto;
}
.article-card {
    background-color: #1e1e1e;
    border: none;
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
}
.img-hover-zoom {
    overflow: hidden;
    border-bottom: 1px solid #333;
}
.img-hover-zoom img {
    transition: transform 0.5s ease;
    height: 200px;
    object-fit: cover;
    width: 100%;
}
.img-hover-zoom:hover img {
    transform: scale(1.05);
}
.section-wrapper {
    position: relative;
    overflow: hidden;
    padding: 0;
}
.article-card {
    background-color: #121212;
    border: none;
    border-radius: 14px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.article-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
}

.article-image-wrapper {
    overflow: hidden;
    border-top-left-radius: 14px;
    border-top-right-radius: 14px;
}
.article-image-wrapper img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.article-image-wrapper:hover img {
    transform: scale(1.07);
}

.bg-gradient-primary {
    background: linear-gradient(45deg, #0062E6, #33AEFF);
    color: #fff;
}
.article-card {
    background-color: #1e1e1e;
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.article-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
}

.img-hover-zoom {
    overflow: hidden;
    border-bottom: 1px solid #333;
}

.img-hover-zoom img {
    transition: transform 0.4s ease;
    height: 160px;
    object-fit: cover;
    width: 100%;
}

.img-hover-zoom:hover img {
    transform: scale(1.05);
}

.article-card .card-body {
    padding: 1rem;
    display: flex;
    flex-direction: column;
}

.article-card .badge {
    width: fit-content;
    font-size: 0.75rem;
    padding: 0.35em 0.6em;
    border-radius: 0.375rem;
    text-transform: capitalize;
}

.article-card .card-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    line-height: 1.3;
    color: #fff;
}

.article-card .card-text {
    font-size: 0.85rem;
    color: #bbb;
    flex-grow: 1;
}

.article-card .btn {
    font-size: 0.8rem;
    padding: 0.375rem 0.75rem;
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
            <div class="container py-4">
  <!-- Header -->
  <div class="container my-5 section10">
  <!-- Section Header -->
  <div class="text-center mb-5">
    <div>
      <p class="h5 mb-1"><strong>Organic Block</strong> Example</p>
      <h2 class="fw-bold mb-3">News From The Blog</h2>
      <p class="text-muted mx-auto" style="max-width: 700px;">
        Discover a curated collection of posts using the Organic Blocks plugin. Create customizable, multi-column blog layouts effortlessly with this versatile feature.
      </p>
    </div>
  </div>
  <!-- Blog Posts Grid -->
    <!-- Blog Post Template -->
    <!-- Repeat for each post -->
     
<?php
function renderArticleCard($article) {
    $category = category::getCategoryById($article['categoryId']);
    ?>
    <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card article-card h-100 text-white">
            <div class="img-hover-zoom">
                <img src="<?php echo $article["image"]; ?>" class="card-img-top" alt="<?php echo $article["title"]; ?>">
            </div>
            <div class="card-body d-flex flex-column p-3">
                <span class="badge bg-primary mb-2 small">
                    <?php echo htmlspecialchars($category[0]['name']); ?>
                </span>
                <h6 class="card-title mb-2" style="font-size: 1rem; line-height: 1.3;">
                    <?php echo htmlspecialchars($article["title"]); ?>
                </h6>
                <p class="card-text flex-grow-1 text-muted" style="font-size: 0.85rem;">
                    <?php echo htmlspecialchars(substr($article["content"], 0, 90)) . '...'; ?>
                </p>
                <a href="../Shared/article.php?id=<?php echo $article['id']; ?>" 
                   class="btn btn-sm btn-outline-light mt-2">Read more →</a>
            </div>
        </div>
    </div>
    <?php
}

$displayArticles = ($mark == 0) ? $articles : $catarticles;

$count = 0;
foreach ($displayArticles as $article) {
    if ($count % 3 == 0) echo '<div class="row">';
    renderArticleCard($article);
    $count++;
    if ($count % 3 == 0) echo '</div>';
}
if ($count % 3 != 0) echo '</div>';
?>
</div>
            </div>
            <div class="section-wrapper">
    <!-- Video Section -->
    <div class="section video-section" style="background-color: black;">
        <div class="video-container">
            <video autoplay muted loop>
                <source
                    src="https://organicthemes.com/demo/chrono/wp-content/blogs.dir/115/files/2023/05/pexels-vlada-karpovich-4452751-1920x1080-25fps.mp4"
                    type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="overlay">
                <p>Access to knowledge shouldn’t depend on where you <br> live or the language you speak.
                    We believe education is <br> a right — and we’re building tools that help make it happen. <br>
                    Explore how language equity is <br> reshaping the future of learning.</p>
            </div>
        </div>
    </div>
</div>
<style>
    /* Main Wrapper for all sections */
    
</style>
<?php 
if(!$rl){
    ?>
    <div class="container py-5">
        <div class="row justify-content-center" >
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card shadow-sm text-center mx-auto" style="max-width: 400px;">
                    <div class="card-body">
                        <p class="text-muted fs-5 mb-2">Deliver amazing digital <br> experiences.</p>
                        <p class="card-text mb-4">We’ve helped thousands of companies, just like yours, change their businesses.</p>
                        <div class="d-flex flex-column gap-2">
                            <a href="#"><button class="btn btn-primary" style="width: 365px;">Talk to us today</button></a>
                            <a href="../auth/login.php"><button class="btn btn-secondary" style="width: 365px;">Sign in</button></a>
                            <a href="../auth/register.php"><button class="btn btn-success " style="width: 365px;">Register</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>


<div class="container my-5 section10">
  <!-- Section Header -->
  <!-- Blog Posts Grid -->
    <!-- Blog Post Template -->
    <!-- Repeat for each post -->


  <!-- <div class="text-center mb-5">
    <p class="fs-5 " style="color:rgb(19, 109, 255);">Recent Highlights</p>
    <h2 class="fw-bold">Translate. Write. Teach. <br class="d-none d-md-block"> Because your voice matters</h2>
  </div>

  
  <div class="row g-4">
  <?php foreach ($articlesShuffeld as $article): 
    
  ?>
    <div class="col-12 col-md-6">
      <div class="card h-100 shadow-sm" style="background-color: black;" id="div<?= $i ?>">
        <img
          id="img<?= $i ?>"
          src="<?= htmlspecialchars($article['image']) ?>"
          class="card-img-top"
          alt="<?= htmlspecialchars($article['title']) ?>"
        >
        <div id="card<?= $i ?>" class="card-body">
          <p class="text-muted" id="info<?= $i ?>">
          <button type="button" class="btn btn-primary m-2">
            <?php  $result=category::getCategoryById($article['categoryId']);
            echo $result[0]['name'];
            ?>
                  </button>
          </p>
          <a href="../Shared/article.php?id=<?php echo $article['id']; ?>"><h2 class="card-title" style="color: red;" id="title<?= $i ?>">
            <?= htmlspecialchars($article['title']) ?>
          </h2></a>
          <p class="card-text" id="text<?= $i ?>">
            <?= nl2br(htmlspecialchars(substr($article["content"], 0, 200))) ?>
          </p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

 
 
</div>
       -->
    

            <?php require_once '../utils/footer.php' ?>
            <!-- Footer End -->
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <!-- <script src="../assets/js/index.js"></script> -->
    <div class="row g-4" id="articles-container">
  <!-- Cards will be dynamically inserted here -->
</div>

<!-- Refresh Button -->
<script src="../assets/js/index.js"></script>

    <?php require_once '../utils/scripts.php' ?>
</body>
</html>