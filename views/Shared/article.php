<?php

// store interactions
// edit article
// report article
// search inside article
// bookmark
// add to list

require_once '../../controllers/ArticleController.php';
require_once '../../controllers/AuthController.php';
require_once '../../controllers/ListsController.php';
require_once '../../controllers/InteractionController.php';
require_once '../../controllers/ReportController.php';
require_once '../../models/interaction.php';

if(session_status() === PHP_SESSION_NONE)
  session_start();

$id = $_GET['id'] ?? null;

$article = ArticleController::getArticle($id);
$translations = ArticleController::getArticleTranslations($id);

$articleLangs = [];
foreach ($translations as $transl) {
  $articleLangs[] = ['id' => $transl->getLanguageId(), 'name' => $transl->getLanguageName()];
}

$likesCount = ArticleController::getArticleLikesCount($id);
$articleComments = ArticleController::getArticleComments($id);

$_SESSION['errMsg'] = ''; //empty it so that if the page is reloaded the errMsg disappears.

if(isset($_POST['newComment'])) {
  if(!empty($_POST['newComment'])) {
    InteractionController::addComment($_POST['newComment'], $id, $_SESSION['userId']);
  } 
  else {
    $_SESSION['errMsg'] = 'Cannot post an empty comment.';
  }
}

if(isset($_POST['commentToRemove'])) {
  $commentToRemove = InteractionController::getComment($_POST['commentToRemove']);
  InteractionController::deleteComment($commentToRemove);
}

if(isset($_POST['bookmark'])) {
  ListsController::addArticleToBookmarks($id);
}

$userLists = [];
if(isset($_SESSION['userId'])) {
    $userLists = Lists::getUserListsExceptBookmarks($_SESSION['userId']);
}

// Add this code to handle the form submission
if(isset($_POST['addToList']) && isset($_POST['selectedList'])) {
    ListsController::addArticleToList($id, $_POST['selectedList']);
}

if(isset($_POST['like'])) {
  InteractionController::addLike($id);
}

if(isset($_POST['reportArticle']) && isset($_POST['reportReason'])) {
  if(isset($_SESSION['userId'])) {
    $reportComment = $_POST['reportComment'] ?? '';
    $reportReason = $_POST['reportReason'];
    
    $report = new Report($_SESSION['userId'], $reportReason, $reportComment);
    $report->setArticleId($id);
    
    if(ReportController::sendReportToAdmin($report)) {
      $_SESSION['errMsg'] = 'Report submitted successfully. Thank you for helping us maintain quality content.';
    } else {
      $_SESSION['errMsg'] = 'There was an error submitting your report. Please try again.';
    }
  } else {
    $_SESSION['errMsg'] = 'You must be logged in to report an article.';
  }
  
  // Redirect to prevent form resubmission
  header("Location: article.php?id=$id");
  exit();
}

if(isset($_POST['removeArticleBtn'])) {
  ArticleController::removeArticle($id);
}
if(isset($_POST['searchkeyword'])) {
  $keyword = $_POST['searchkeyword'];
  $result = ArticleController::highlightKeyword($id,$keyword);
  if($result){
    $article->setContent($result);
  }
  else{
    $_SESSION['errMsg'] = 'No results found.';
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $article->getTitle()?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <link href="img/favicon.ico" rel="icon" />
  <?php require_once '../utils/linkTags.php' ?>
  <style>
    .top-right-alert {
      position: fixed;
      top: 20px;
      right: 20px;
      width: 25rem;
      z-index: 1050;
    }
/* Container and layout */
.search-form {
  max-width: 320px;
}

/* Input group styling */
.search-input-group {
  display: flex;
  align-items: center;
  background-color: #1e1e1e;
  border-radius: 50px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
  overflow: hidden;
  transition: box-shadow 0.3s ease;
}

.search-input-group:hover {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
}

/* Input field */
.search-input {
  flex: 1;
  padding: 10px 16px;
  background-color: transparent;
  border: none;
  color: #fff;
  font-size: 1rem;
  border-radius: 50px 0 0 50px;
}

.search-input::placeholder {
  color: #aaa;
  transition: color 0.3s;
}

.search-input:focus {
  outline: none;
  background-color: #2a2a2a;
  box-shadow: none;
}

/* Button */
.search-btn {
  background-color: #f8f9fa;
  color: #000;
  padding: 10px 16px;
  border: none;
  border-radius: 0 50px 50px 0;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.search-btn:hover {
  background-color: #e2e6ea;
  color: #000;
}

/* Icon */
.search-btn i {
  font-size: 1.2rem;
}
</style>
</head>
<body>

  <?php if(isset($_SESSION['errMsg']) && !empty($_SESSION['errMsg'])):?>
  <div class="top-right-alert">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <i class="fa fa-exclamation-circle me-2"></i> <?=$_SESSION['errMsg']?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  <?php endif ?>

  <div class="container-fluid position-relative d-flex p-0">

    <?php require_once '../utils/spinner.php'?>

    <?php require_once '../utils/sidebar.php'?>

    <div class="content">
      <?php require_once '../utils/nav.php'?>

      <div class="container-fluid mt-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
          <h1 class="mb-3 mb-md-0 text-title" id="articleTitle"><?php echo $article->getTitle()?></h1>
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

        <?php if(AuthController::isAdmin()):?>
        <form action="article.php?id=<?=$id?>" method="POST">
          <div class="d-flex justify-content-center align-items-center">
            <input type="hidden" name="removeArticleBtn" id="<?=$id?>">
            <button class="btn btn-danger">Remove article</button>
          </div>
        </form>
        <?php endif ?>

        <div class="d-flex align-items-center justify-content-between mb-3">
          <span class="badge bg-info text-dark py-2"><?php echo $article->getCategoryName() ?></span>
          
  <form class="search-form d-flex ms-4 align-items-center" method="post"  action="article.php?id=<?= $id ?>" name="searchkeyword">
    <input type="hidden" name="articleId" value="<?= $id ?>">
  <div class="search-input-group">
    <input
  type="search"
  name="searchkeyword"
  class="form-control search-input"
  placeholder="Search..."
  aria-label="Search"
/>

    <button class="btn search-btn" type="submit">
      <i class="bi bi-search"></i>
    </button>
  </div>
</form>


          <?php if(isset($_SESSION['username'])): ?>
          <div class="d-flex gap-2">

            <?php $isBookmarked = ListsController::isArticleBookmarked($id); ?>
            <form method="POST" action="article.php?id=<?= $id ?>" class="d-inline">
              <input type="hidden" name="bookmark" value="<?=$id?>">
              <button type="submit" class="btn <?= $isBookmarked ? 'btn-warning text-dark' : 'btn-outline-light' ?>" title="<?= $isBookmarked ? 'Remove Bookmark' : 'Bookmark' ?>">
                <i class="fa fa-bookmark"></i> <?= $isBookmarked ? 'Bookmarked' : 'Bookmark' ?>
              </button>
            </form>


            <div class="dropdown d-inline">
              <button class="btn btn-outline-light dropdown-toggle" type="button" id="addToListDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Add to List">
                <i class="fa fa-list-ul"></i> Add to List
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="addToListDropdown">
                <?php if(count($userLists) > 0): ?>
                  <?php foreach($userLists as $list): ?>
                    <li>
                      <form method="POST" action="article.php?id=<?= $id ?>" class="dropdown-item">
                        <input type="hidden" name="addToList" value="<?= $id ?>">
                        <input type="hidden" name="selectedList" value="<?= $list['id'] ?>">
                        <button type="submit" class="btn btn-link text-white p-0"><?= $list['name'] ?></button>
                      </form>
                    </li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li><span class="dropdown-item">No lists available</span></li>
                <?php endif; ?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../../views/client/lists.php?id=<?= $_SESSION['userId'] ?>">Manage Lists</a></li>
              </ul>
            </div>

          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reportModal" title="Report">
            <i class="fa fa-exclamation-circle me-1"></i> Report
          </button>

          </div>
          <?php endif; ?>

        </div>

        <div class="mb-4 border-1 border border-white rounded-1">
          <img src="<?php echo $article->getImage() ?>" alt="Article banner" class="img-fluid w-100 rounded shadow" style="max-height: 400px; object-fit: cover;">
        </div>
        <article class="text-main" id="articleContent">
          <p><?php echo $article->getContent()?></p>
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
          <?php $isLiked = InteractionController::isArticleLiked($id); ?>
          <form method="POST" action="article.php?id=<?= $id ?>" class="d-inline">
            <input type="hidden" name="like" value="<?=$id?>">
            <button type="submit" class="btn <?= $isLiked ? 'btn-primary' : 'btn-outline-primary' ?>" title="<?= $isLiked ? 'Unlike' : 'Like' ?>">
              <i class="fa fa-thumbs-up"></i> <?= $isLiked ? 'Liked' : 'Like' ?>
            </button>
          </form>

          <span class="text-light"><?php echo $likesCount ?> Likes</span>
        </div>

        <div class="container mt-5">
          <h4 class="text-light mb-4">Comments (<?php echo count($articleComments); ?>)</h4>

          <?php if (count($articleComments) === 0): ?>
            <p class="text-muted">No comments yet. Be the first to comment!</p>
          <?php endif?>
    
          <!-- Comment box -->
          <form class="mt-4 mb-3" method="POST" action="article.php?id=<?=$id?>">
            <div class="mb-3">
              <textarea name="newComment" class="form-control bg-dark text-white border-light" rows="3" placeholder="Add a comment..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
          </form>
    
    
          <?php foreach (array_reverse($articleComments) as $comment): ?>
            <div class="d-flex mb-4 p-3 rounded" style="background:rgb(60, 60, 60); align-items: flex-start;">
              <img src="<?php echo $comment->getUserProfilePic() ?>" class="rounded-circle me-3" style="width: 45px; height: 45px; object-fit: cover;">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start mb-1">
                  <div>
                    <strong class="text-title me-2"><?php echo $comment->getUsername() ?></strong>
                    <small style="color: rgb(150, 150, 150)"><?php echo $comment->getDate() ?></small>
                  </div>
                  <div>
                    <a href="editComment.php?id=<?php echo $comment->getId() ?>" class="text-decoration-none me-2" title="Edit">
                      <i class="bi bi-pencil-square text-light"></i>
                    </a>
                    <form method="POST" action="article.php?id=<?=$id?>" class="d-inline">
                      <input type="hidden" name="commentToRemove" value="<?=$comment->getId()?>">
                      <button type="submit" class="btn p-0" title="Delete" onclick="return confirm('Are you sure you want to delete this comment?')">
                        <i class="bi bi-trash text-danger"></i>
                      </button>
                    </form>
                  </div>
                </div>
                <p class="text-main mb-0" style="white-space: pre-wrap; word-break: break-word;"><?php echo $comment->getContent() ?></p>
              </div>
            </div>
          <?php endforeach; ?>
  
        <div class="d-flex flex-column align-items-center mt-4">
          <hr class="w-100" style="border-top: 3px solid white; margin-bottom: 20px;">
          <img src="../assets/img/user.jpg" alt="Author Image" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
          <p class="text-main mb-0">
            Published on <?php echo $article->getPublishDate()?> by <strong><?php echo $article->getEditorUsername()?></strong>
          </p>
        </div>
      </div>
      <?php require_once '../utils/footer.php' ?>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
  </div>

<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-main">
      <div class="modal-header" style="background-color: #343a40; border-bottom: 1px solid #495057;">
        <h5 class="modal-title" id="reportModalLabel">Report Article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="article.php?id=<?= $id ?>">
        <div class="modal-body">
          <input type="hidden" name="reportArticle" value="<?= $id ?>">

          <div class="mb-4">
            <label class="form-label fw-bold text-main">Reason for reporting:</label>
            <?php 
              $reportReasons = ReportController::getReportReasons();
              if (count($reportReasons) > 0):
                foreach ($reportReasons as $reason): 
            ?>
              <div class="form-check mt-2">
                <input class="form-check-input border border-light" type="radio" name="reportReason" 
                      id="reason<?= $reason['id'] ?>" value="<?= $reason['reason'] ?>" required>
                <label class="form-check-label" for="reason<?= $reason['id'] ?>">
                  <?= htmlspecialchars($reason['reason']) ?>
                </label>
              </div>
            <?php 
              endforeach;
            else: 
            ?>
              <div class="alert alert-warning text-dark">No report reasons available</div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="reportComment" class="form-label fw-bold text-main">Additional comments (optional):</label>
            <textarea class="form-control bg-dark text-main border-light" 
                      id="reportComment" name="reportComment" rows="3"
                      placeholder="Provide additional details about the issue..."></textarea>
          </div>
        </div>
        <div class="modal-footer" style="background-color: #343a40; border-top: 1px solid #495057;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Submit Report</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php require_once '../utils/scripts.php' ?>

  <!-- Pass translations to JavaScript -->
  <script>
    const translations = <?php echo json_encode($translations); ?>;
    const defaultArticle = {
      title: <?php echo json_encode($article->getTitle()); ?>,
      content: <?php echo json_encode($article->getContent()); ?>
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