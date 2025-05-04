<?php
require_once '../../controllers/ArticleController.php';

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

$translations = ArticleController::getArticleTranslations($id);
$articleLangs = ArticleController::getAvailableLanguages($id);
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
          <h1 class="mb-3 mb-md-0 text-title" id="articleTitle"><?php echo $article[0]['title']?></h1>
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
        <span class="badge bg-primary py-2 mb-3"><?php echo $article[0]['categoryName']; ?></span>
        <div class="mb-4 border-1 border border-white rounded-1">
          <img src="<?php echo $article[0]['image'] ?>" alt="Article banner" class="img-fluid w-100 rounded shadow" style="max-height: 400px; object-fit: cover;">
        </div>
        <article class="text-main" id="articleContent">
          <p><?php echo $article[0]['content']?></p>
        </article>
        <div class="d-flex flex-column align-items-center mt-4">
          <hr class="w-100" style="border-top: 3px solid white; margin-bottom: 20px;">
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