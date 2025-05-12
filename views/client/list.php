<?php
require_once '../../controllers/ArticleController.php';
require_once '../../controllers/InteractionController.php';
require_once '../../models/interaction.php';
require_once '../../controllers/AuthController.php';
require_once '../../controllers/ListsController.php';
require_once '../../views/utils/alert.php';

if(session_status() === PHP_SESSION_NONE)
  session_start();

$id = $_GET['id'] ?? null;
if (!$id) {
  header('location: ../Shared/404.php');
  exit;
}

// Handle POST requests (for non-JS fallback)
if(isset($_POST['articleToRemove'])){
  $articleId = $_POST['articleToRemove'];
  ListsController::removeArticleFromList($id, $articleId);
}

$list = ListsController::getList($id);
$listArticles = ListsController::fetchListArticles($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo htmlspecialchars($list[0]['name'] ?? 'List') ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <link href="img/favicon.ico" rel="icon" />
  <?php require_once '../utils/linkTags.php' ?>
</head>
<body>
  <?php Alert::renderAlert() ?>

  <div class="container-fluid position-relative d-flex p-0">
    <?php require_once '../utils/spinner.php'?>
    <?php require_once '../utils/sidebar.php'?>
    <div class="content">
      <?php require_once '../utils/nav.php'?>

      <div class="bg-success rounded p-4 mb-4">
        <div class="d-flex align-items-center justify-content-center">
          <h1 class="text-title mb-0">
              <i class="fa fa-list-ul me-2"></i>
              <?php echo htmlspecialchars($list[0]['name'] ?? 'List'); ?> 
              (<span id="article-count"><?= count($listArticles) ?></span> Articles)
          </h1>
        </div>
      </div>

      <div id="articles-container">
        <?php foreach($listArticles as $listArticle): ?>
        <div class="container-fluid mb-3 article-item" data-article-id="<?php echo htmlspecialchars($listArticle['article_id']); ?>">
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
              <button class="btn btn-sm btn-danger remove-article-btn ms-auto" 
                      data-list-id="<?php echo htmlspecialchars($id); ?>"
                      data-article-id="<?php echo htmlspecialchars($listArticle['article_id']); ?>">
                <i class="bi bi-x-circle"></i> Remove
              </button>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <?php require_once '../utils/footer.php' ?>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i> 
    </a>
  </div>

  <?php require_once '../utils/scripts.php' ?>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Handle article removal with AJAX
    document.querySelectorAll('.remove-article-btn').forEach(button => {
      button.addEventListener('click', function() {
        const listId = this.dataset.listId;
        const articleId = this.dataset.articleId;
        const articleItem = this.closest('.article-item');
        
          // Show loading state
          this.innerHTML = '<i class="bi bi-arrow-repeat"></i> Removing...';
          this.disabled = true;
          
          // Create form data
          const formData = new FormData();
          formData.append('articleToRemove', articleId);
          
          // Send AJAX request
          fetch(`list.php?id=${listId}`, {
            method: 'POST',
            body: formData,
            headers: {
              'X-Requested-With': 'XMLHttpRequest' // Identify as AJAX request
            }
          })
          .then(response => {
            if(response.ok) {
              // Remove the article from DOM
              articleItem.remove();
              
              // Update article count
              const countElement = document.getElementById('article-count');
              countElement.textContent = parseInt(countElement.textContent) - 1;
            } else {
              throw new Error('Failed to remove article');
            }
          })
          .catch(error => {
            console.error(error);
            alert('Error removing article');
            this.innerHTML = '<i class="bi bi-x-circle"></i> Remove';
            this.disabled = false;
          });
      });
    });
  });
  </script>
</body>
</html>