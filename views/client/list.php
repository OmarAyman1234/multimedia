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

if(session_status() === PHP_SESSION_NONE)
  session_start();

$id = $_GET['id'];
if (!$id) {
  header('location: 404.php');
  exit;
}

$article = ArticleController::getArticle($id);
if (!$article) {
  header('location: 404.php');
  exit;
}

if(isset($_POST['newComment']) && isset($_SESSION['roleId'])) {
  if(!empty($_POST['newComment'])) {
    $interaction = new Interaction(2, $_POST['newComment']);
    InteractionController::addComment($interaction, $id);
  }
}
// $listId = $_GET['id']; 
$listArticles = AuthController::fetchArticles($id);
$translations = ArticleController::getArticleTranslations($id);
$articleLangs = ArticleController::getAvailableLanguages($id);
$articleLikes = ArticleController::getArticleLikesCount($id);
$articleComments = ArticleController::getArticleComments($id);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $article[0]['title']?></title>
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
      <div class="container-fluid mt-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
          <?php 
          foreach($listArticles as $listArticle)
          {
          
          ?>

          <h1 class="mb-3 mb-md-0 text-title" id="articleTitle"><?php echo $listArticle['title']?></h1>

          <div class="ms-md-auto" style="width: 160px;">
            <select class="form-select bg-dark text-white border-light" id="languageSelect">
              <option value="1" selected>English</option>
              <?php 
              foreach ($articleLangs as $articleLang) {
              ?>
                <option value="<?php echo $articleLang['id']?>"><?php echo $articleLang['name']?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="badge bg-info text-dark py-2"><?php echo $article[0]['categoryName']; ?></span>
          <?php
          if(isset($_SESSION['username'])) {
            ?>
            <form method="POST" action="lists.php" class="delete-form">
            <!-- <input type="hidden" name="articleId" value="<?php echo htmlspecialchars($listArticle['id']); ?>"> -->
            <button class="btn btn-danger">Remove From List </button>
          </form>
          <?php
          }
          ?>
        </div>

        <div class="mb-4 border-1 border border-white rounded-1">
          <img src="<?php echo $article[0]['image'] ?>" alt="Article banner" class="img-fluid w-100 rounded shadow" style="max-height: 400px; object-fit: cover;">
        </div>
        <article class="text-main" id="articleContent">
          <p><?php echo $listArticle['content']?></p>
        </article>
        <div class="d-flex flex-column align-items-center mt-4">
          <hr class="w-100" style="border-top: 3px solid white; margin-bottom: 20px;">

          <?php
          if(isset($_SESSION['roleId']) && $_SESSION['roleId'] == 2) {
            ?>
            <button class="btn btn-light mb-3 px-5">Edit <i class="fa fa-pen"></i></button>
          <?php
          }
          ?>
          

          <div class="d-flex justify-content-start align-items-center gap-4 mt-3 mb-4">
  <span class="text-light"><i class="fa fa-thumbs-up m-1"></i><?php echo $articleLikes ?></span>
  <span class="text-light"><i class="fa fa-comments m-1"></i><?php echo count($articleComments) ?>   Comments</span>
</div>

<div class="container mt-5">
  <h4 class="text-light mb-4">Comments (<?php echo count($articleComments); ?>)</h4>

  
  <?php if (count($articleComments) === 0): ?>
    <p class="text-muted">No comments yet. Be the first to comment!</p>
  <?php endif?>
    
    <!-- Comment box -->
    <form class="mt-4" method="POST" action="article.php?id=<?php echo $id ?>">
    <div class="mb-3">
      <textarea name="newComment" class="form-control bg-dark text-white border-light" rows="3" placeholder="Add a comment..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Post Comment</button>
  </form>
    
    
    <?php foreach (array_reverse($articleComments) as $comment): ?>
      <div class="d-flex mb-4 bg-dark p-3 rounded">
        <img src="<?php echo $comment['profilePicture']; ?>" class="rounded-circle me-3" style="width: 45px; height: 45px; object-fit: cover;">
        <div>
          <div class="d-flex align-items-center mb-1">
            <strong class="text-title me-2"><?php echo $comment['username']; ?></strong>
            <small style="color: rgb(150, 150, 150)"><?php echo $comment['date']; ?></small>
          </div>
          <p class="text-main mb-0"><?php echo $comment['content']; ?></p>
        </div>
      </div>
    
    <?php endforeach; ?>
  


</div>
          <?php 
          }?>




<div class="d-flex flex-column align-items-center mt-4">

          <img src="../assets/img/user.jpg" alt="Author Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
          <p class="text-main mb-0">
            Published on <?php echo $article[0]['publishDate']?> by <strong><?php echo $article[0]['editorUsername']?></strong>
          </p>
        </div>
      </div>
      <?php require_once '../utils/footer.php' ?>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

  <?php require_once '../utils/scripts.php' ?>


  <!-- Pass translations to JavaScript -->
  <script>
    const translations = <?php echo json_encode($translations); ?>;
    const defaultArticle = {
      title: <?php echo json_encode($article[0]['title']); ?>,
      content: <?php echo json_encode($article[0]['content']); ?>
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
