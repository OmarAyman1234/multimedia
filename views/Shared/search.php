<?php 
require_once '../../controllers/DBController.php';
require_once '../../controllers/ArticleController.php';
require_once '../../models/article.php';
require_once '../../controllers/SearchController.php';
require_once '../../models/category.php';
require_once '../../models/searchHistory.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
  }

// Get the search keyword
$title = isset($_POST['search']) ? $_POST['search'] : '';

// Get articles by keyword
$articles = SearchController::getArticlesByKeyword($title);

// Get all categories for filter dropdown
$allCategories = category::getAllCategory();

// Handle category filter if submitted
$selectedCategory = isset($_POST['category_filter']) ? $_POST['category_filter'] : '';
if (!empty($selectedCategory)) {
  $articles = array_filter($articles, function($article) use ($selectedCategory) {
    return $article['categoryId'] == $selectedCategory;
  });
}

// Handle date filter if submitted
$selectedDate = isset($_POST['date_filter']) ? $_POST['date_filter'] : '';
if (!empty($selectedDate)) {
  $articles = array_filter($articles, function($article) use ($selectedDate) {
    // Filter based on date - assumes created_at is in YYYY-MM-DD format
    return substr($article['created_at'], 0, 10) == $selectedDate;
  });
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
      
      <!-- Filters Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 mb-4">
          <form method="post" class="row g-3 align-items-end">
            <!-- Keep the original search parameter -->
            <input type="hidden" name="search" value="<?php echo htmlspecialchars($title); ?>">
            
            <!-- Category Filter -->
            <div class="col-md-5">
              <label for="category_filter" class="form-label">Filter by Category</label>
              <select class="form-select" id="category_filter" name="category_filter">
                <option value="">All Categories</option>
                <?php foreach($allCategories as $category): ?>
                <option value="<?php echo $category['id']; ?>" <?php echo ($selectedCategory == $category['id']) ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($category['name']); ?>
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            
            <!-- Date Filter -->
            <div class="col-md-5">
              <label for="date_filter" class="form-label">Filter by Date</label>
              <input type="date" class="form-control" id="date_filter" name="date_filter" value="<?php echo $selectedDate; ?>">
            </div>
            
            <!-- Submit Button -->
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Filters End -->

<!-- Sale & Revenue Start -->

<div class="container my-5">
    <?php if (empty($articles)): ?>
        <div class="alert alert-warning text-center fw-bold rounded-3">
            No articles found for your search.
        </div>
    <?php else: ?>
        <?php 
        $count = 0;
        $total = count($articles);

        foreach ($articles as $index => $article) {
            if ($count % 3 == 0) {
                echo '<div class="row justify-content-center g-4 mb-4">';
            }
            ?>
            
            <div class="col-12 col-sm-10 col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="card h-100 shadow-lg rounded-4 overflow-hidden w-100" style="background-color: #1e1e1e; color: white;">
                    <img src="<?php echo htmlspecialchars($article["image"]); ?>" 
                        alt="<?php echo htmlspecialchars($article["title"]); ?>" 
                        class="card-img-top" 
                        style="height: 220px; object-fit: cover;">

                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold mb-3">
                            <?php echo htmlspecialchars($article["title"]); ?>
                        </h5>
                        <button type="button" class="btn btn-primary m-2">
            <?php  $result=category::getCategoryById($article['categoryId']);
            echo $result[0]['name'];
            ?>
                  </button>
                        <p class="card-text flex-grow-1" style="opacity: 0.85;">
                            <?php echo htmlspecialchars(substr($article["content"], 0, 120)) . '...'; ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                          <a href="../Shared/article.php?id=<?php echo $article['id']; ?>" class="btn btn-outline-light mt-3 rounded-pill align-self-start px-4 py-2">
                              Read more →
                          </a>
                          <?php if(!empty($article['created_at'])): ?>
                            <small class="text-muted mt-3">
                              <?php echo date('M d, Y', strtotime($article['created_at'])); ?>
                            </small>
                          <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $count++;
            if ($count % 3 == 0 || $index == $total - 1) {
                echo '</div>';
            }
        }
        ?>
    <?php endif; ?>
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