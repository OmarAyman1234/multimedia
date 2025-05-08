<?php


// store interactions
// edit article
// report article
// search inside article
// bookmark
// add to list

require_once '../../controllers/ArticleController.php';
require_once '../../controllers/InteractionController.php';
require_once '../../models/interaction.php';
require_once '../../controllers/AuthController.php';
require_once '../../controllers/ListsController.php';

if(session_status() === PHP_SESSION_NONE)
  session_start();

$id = $_GET['id'];
if (!$id) {
  header('location: ../Shared/404.php');
  exit;
}

// $article = ArticleController::getArticle($id);




if(isset($_POST['articleToRemove'])){
  $articleId = $_POST['articleToRemove'];
  ListsController::removeArticleFromList($id, $articleId);
  header('location: ../Shared/404.php'); 
}
if(isset($_POST['articleID'])){
  $articleId = $_POST['articleID'];
  header('location: ../Shared/article.php?id=<php echo htmlspecialchars($articleId); ?>'); 
}

// $listId = $_GET['id'];

$listArticles = ListsController::fetchListArticles($id);
$translations = ArticleController::getArticleTranslations($id);
// $articleLangs = ArticleController::getAvailableLanguages($id);
$articleLikes = ArticleController::getArticleLikesCount($id);
$articleComments = ArticleController::getArticleComments($id);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $listsArticle['title']?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <link href="img/favicon.ico" rel="icon" />
  <?php require_once '../utils/linkTags.php' ?>
</head>
<body>
  <div class="container-fluid position-relative d-flex p-0">
    <?php require_once '../utils/spinner.php'?>
    <?php require_once '../utils/sidebar.php'?>
    <div class="content">
      <?php require_once '../utils/nav.php'?>
          <?php 
          foreach($listArticles as $listArticle)
          {
          
          ?>
      <div class="container-fluid mt-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
          <form method="POST" action="list.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" class="delete-form">
                <input type="hidden" name="articleID" value="<?php echo htmlspecialchars($listArticle['article_id']); ?>">          
                <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
              <h1 class="mb-3 mb-md-0 text-title" id="articleTitle"><?php echo $listArticle['title']?></h1>
            </button>
          </form>

          <div class="ms-md-auto" style="width: 160px;">
  
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="badge bg-info text-dark py-2"><?php //echo $listArticle['categoryid']; ?></span>
          <?php
          if(isset($_SESSION['username'])) {
            ?>
            <form method="POST" action="list.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" class="delete-form">
            <input type="hidden" name="articleToRemove" value="<?php echo htmlspecialchars($listArticle['article_id']); ?>">
            <button class="btn btn-danger">Remove From List </button>
          </form>
          <?php
          }
          ?>
        </div>

        <div class="mb-4 border-1 border border-white rounded-1">
          <img src="<?php echo $listArticle['image'] ?>" alt="Article banner" class="img-fluid w-100 rounded shadow" style="max-height: 400px; object-fit: cover;">
        </div>
        <div class="d-flex flex-column align-items-center mt-4">
          <hr class="w-100" style="border-top: 3px solid white; margin-bottom: 20px;">


          

          <div class="d-flex justify-content-start align-items-center gap-4 mt-3 mb-4">

</div>

<div class="container mt-5">
  
</div>
          <?php 
          }?>




<div class="d-flex flex-column align-items-center mt-4">

          <img src="../assets/img/user.jpg" alt="Author Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
          <p class="text-main mb-0">
            <!-- Published on <?php //echo $article[0]['publishDate']?> by <strong><//?php// echo $article[0]['editorUsername']?></strong>
          </p>
        </div>
      </div>
      <?php require_once '../utils/footer.php' ?>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i> -->
    </a>
  </div>

  <?php require_once '../utils/scripts.php' ?>


  <!-- Pass translations to JavaScript -->
  <script>
    const translations = <?php echo json_encode($translations); ?>;
    const defaultArticle = {
      title: <?php echo json_encode($listArticle['title']); ?>,
     // content: <//?php// echo json_encode($article[0]['content']); ?>
    };

    document.getElementById('languageSelect').addEventListener('change', function() {
      const selectedLangId = this.value;
      const titleElement = document.getElementById('articleTitle');
      const contentElement = document.getElementById('articleContent');

      if (selectedLangId === '1') {
        // Default English content
        titleElement.textContent = defaultArticle.title;
        contentElement.innerHTML = `<p>${defaultArticle.content}</p>`;
      } else {
        // Find the translation for the selected language
        const translation = translations.find(t => t.languageId === selectedLangId);
        if (translation) {
          titleElement.textContent = translation.translatedTitle;
          contentElement.innerHTML = `<p>${translation.translatedContent}</p>`;
        }
      }
    });
  </script>
</body>
</html>
