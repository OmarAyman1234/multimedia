<?php

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


if(isset($_POST['articleToRemove'])){
  $articleId = $_POST['articleToRemove'];
  ListsController::removeArticleFromList($id, $articleId);
}

// if(isset($_POST['articleID'])){
//   $articleId = $_POST['articleID'];
//   header("location: ../Shared/article.php?id=<php echo htmlspecialchars($articleId); >"); 
// }

// $listId = $_GET['id'];

$list = ListsController::getList($id);
$listArticles = ListsController::fetchListArticles($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $list[0]['name']?></title>
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

      <div class="bg-success rounded p-4 mb-4">
        <div class="d-flex align-items-center justify-content-center">
          <h1 class="text-title mb-0">
              <i class="fa fa-list-ul me-2"></i>
              <?php echo htmlspecialchars($list[0]['name']); ?> (<?= count($listArticles)?> Articles)
          </h1>
        </div>
      </div>



      <?php foreach($listArticles as $listArticle): ?>
      <div class="container-fluid mb-3">
        <div class="bg-secondary rounded d-flex align-items-center p-3 shadow-sm" style="min-height: 110px;">
      
          <!-- Thumbnail -->
          <a href="../Shared/article.php?id=<?php echo htmlspecialchars($listArticle['article_id']); ?>" class="flex-shrink-0">
            <img src="<?php echo htmlspecialchars($listArticle['image']); ?>" alt="Thumbnail"
              class="rounded" style="width: 150px; height: 90px; object-fit: cover;">
          </a>

          <!-- Article Info -->
          <div class="ms-4 flex-grow-1">
            <a href="../Shared/article.php?id=<?php echo htmlspecialchars($listArticle['article_id']); ?>" class="text-main fw-semibold fs-5 text-decoration-none">
              <?php echo htmlspecialchars($listArticle['title']); ?>
            </a>
          </div>

          <!-- Remove Button -->
          <?php if (isset($_SESSION['username'])): ?>
            <form method="POST" action="list.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" class="ms-auto">
              <input type="hidden" name="articleToRemove" value="<?php echo htmlspecialchars($listArticle['article_id']); ?>">
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-x-circle"></i> Remove
              </button>
            </form>
          <?php endif; ?>

        </div>
      </div>
      <?php endforeach; ?>

    <?php require_once '../utils/footer.php' ?>
    </div>
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i> 
      </a>
    </div>

  <?php require_once '../utils/scripts.php' ?>

</body>
</html>
