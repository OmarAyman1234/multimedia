<?php
require_once '../../models/article.php';


  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  if (isset($_GET['random']) && $_GET['random'] === '1') {
    unset($_SESSION['selected_article']);
    header("Location: ../Shared/randomArticle.php");
    exit;
}
  if (!isset($_SESSION['selected_article'])) {
    $articles = article::getAllArticles();
    $articlesShuffled = article::getShuffledArticles($articles);
    $_SESSION['selected_article'] = $articlesShuffled[0];
}

$article = $_SESSION['selected_article'];



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
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .article-card {
      background-color:#333;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .article-card:hover {
      transform: translateY(-5px);
    }

    .article-img {
      max-height: 400px;
      object-fit: cover;
    }

    .author-info img {
      width: 48px;
      height: 48px;
      object-fit: cover;
    }

    .article-title {
      font-size: 2.5rem;
      font-weight: 700;
    }

    .lead {
      font-size: 1.25rem;
      color:blanchedalmond;
    }

    .badge {
      font-size: 0.9rem;
      padding: 0.6em 0.9em;
      border-radius: 0.5rem;
    }

    .article-content p {
      font-size: 1.1rem;
      line-height: 1.7;
      color:#f8f9fa;
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
      <div class="col-lg-10">
        <div class="article-card">
          <img src="<?php echo $article['image']; ?>" class="article-img" alt="Article Banner" style="width: 100%; height: auto;" />

          <div class="p-5">
            <h1 class="article-title mb-3"><?php echo $article['title']; ?></h1>

            <div class="d-flex align-items-center mb-4 text-muted author-info">
              <img src="<?php echo $article['profilePicture']; ?>" class="me-3" alt="Author">
              <div>
                <strong><?php echo $article['username'] ?></strong><br />
                <small><?php echo $article['publishDate']; ?></small>
              </div>
            </div>

            <div class="article-content">
             <p> <?= nl2br(htmlspecialchars(substr($article["content"], 0, 600))) ?></p>
             <a href="../Shared/article.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-light mt-3 rounded-pill align-self-start px-4 py-2">
                            Read more →
                        </a>
            </div>

            <div class="mt-4">
              <span class="badge bg-primary"><?php echo $article['categoryName'] ?></span>
             
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
  <script>
document.addEventListener("DOMContentLoaded", function () {
  const randomBtn = document.getElementById("randomArticleBtn");

  if (randomBtn) {
    randomBtn.addEventListener("click", function (e) {
      e.preventDefault();

      fetch("../Shared/getRandomArticle.php")
        .then(response => response.json())
        .then(article => {
          document.querySelector(".article-img").src = article.image;
          document.querySelector(".article-title").innerText = article.title;
          document.querySelector(".author-info img").src = article.profilePicture;
          document.querySelector(".author-info strong").innerText = article.username;
          document.querySelector(".author-info small").innerText = article.publishDate;
          document.querySelector(".article-content p").innerHTML = article.content.substring(0, 600);
          document.querySelector(".article-content a").href = `../Shared/article.php?id=${article.id}`;
          document.querySelector(".badge").innerText = article.categoryName;
        })
        .catch(error => console.error("Error loading article:", error));
    });
  }
});
</script>

</body>
</html>
