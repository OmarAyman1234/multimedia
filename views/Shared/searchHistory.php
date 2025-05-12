<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
require_once '../../controllers/DBController.php';
require_once '../../controllers/ArticleController.php';
require_once '../../models/article.php';
require_once '../../controllers/SearchController.php';
require_once '../../models/searchHistory.php';

if(isset($_SESSION['userId'])){
  $result= SearchController::getSearchHistoryByUserId($_SESSION['userId']);
}
else{
  $result= SearchController::getSearchHistoryByUserId(0);
}

if($result){
    foreach($result as $row){
        $searchHistory = new SearchHistory();
        $searchHistory->setId($row['id']);
        $searchHistory->setUserId($row['userId']);
        $searchHistory->setSearchTerm($row['searchTerm']);
        $searchHistory->setSearchTime($row['searchTime']);
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
  <style>
    /* Custom Card Styling */
.custom-card {
  background-color: #fdfdfd;
  border: 1px solid #dee2e6;
  border-radius: 12px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
  transition: box-shadow 0.3s ease-in-out;
}

.custom-card:hover {
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

/* Title Styling */
.custom-title {
  font-weight: 600;
  color: #333;
  font-family: 'Segoe UI', sans-serif;
}

/* Table Styling */
.custom-table thead {
  background-color: #e9f3ff;
  color: #2a2f45;
  font-weight: 600;
}

.custom-table tbody tr {
  transition: background-color 0.2s ease-in-out;
}

.custom-table tbody tr:hover {
  background-color: #f0f8ff;
}

.custom-table td {
  padding: 12px;
}

/* Delete Button Styling */
.custom-delete-btn {
  background-color: #ff4d4f;
  color: white;
  padding: 6px 16px;
  border-radius: 50px;
  font-weight: 500;
  font-size: 0.9rem;
  transition: all 0.2s ease-in-out;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-decoration: none;
  display: inline-block;
}

.custom-delete-btn:hover {
  background-color: #d9363e;
  transform: scale(1.05);
  color: #fff;
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
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-12">
      <div class="custom-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="custom-title mb-0">Search History</h4>
        </div>
        <div class="table-responsive">
          <table class="table custom-table align-middle text-center">
            <thead>
              <tr>
                <th>🔍 Search Term</th>
                <th>⏱ Time</th>
                <th>🗑 Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($result && count($result) > 0): ?>
                <?php foreach ($result as $row): ?>
                  <tr>
                    <td class="text-start"><?= htmlspecialchars($row['searchTerm']) ?></td>
                    <td><?= htmlspecialchars($row['searchTime']) ?></td>
                    <td>
                      <a href="deleteSearchHistory.php?id=<?= $row['id'] ?>"
                         class="btn custom-delete-btn"
                         onclick="return confirm('Are you sure you want to delete this search?');">
                        Delete
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-muted py-4">No search history found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
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
$(document).ready(function(){
  $(document).on('click', '.custom-delete-btn', function(e){
    e.preventDefault();

    var deleteUrl = $(this).attr('href');
    var row = $(this).closest('tr');
    $.ajax({
      type: 'GET',
      url: deleteUrl,
      success: function(response) {
        if(response === 'success') {
          row.fadeOut(function() {
            $(this).remove();
          });
        } else {
          alert('Failed to delete search history. Please try again.');
        }
      },
      error: function() {
        alert('An error occurred. Please try again.');
      }
    });
  });
});
</script>

</body>
</html>
