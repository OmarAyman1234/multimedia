<?php
require_once "../../controllers/ListsController.php";
require_once "../../models/list.php";
require_once "../../views/utils/alert.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$id = $_SESSION['userId'];
$userId = $_GET['id'];

if (!$userId) {
  header('location: ../Shared/404.php');
  exit;
}

// Default sort direction
$sortDirection = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

// Get lists and sort them
$lists = ListsController::getLists($userId);

// Sort the lists based on the direction
if ($sortDirection === 'asc') {
  usort($lists, function($a, $b) {
    return strcasecmp($a['name'], $b['name']);
  });
} elseif ($sortDirection === 'desc') {
  usort($lists, function($a, $b) {
    return strcasecmp($b['name'], $a['name']);
  });
}

// Handle list deletion
if (isset($_POST['list_id_to_delete'])) {
  $listId = $_POST['list_id_to_delete'];
  // Assuming you have a ListController class with a static method deleteList
  ListsController::deleteList(listId: $listId);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Lists</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Link to external CSS stylesheets -->
  <?php require_once '../utils/linkTags.php' ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
</head>

<body>
  <?php Alert::renderAlert() ?>
  
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

      <div class="container-fluid pt-4 px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="text-title fw-bold display-5 d-flex align-items-center gap-3 mb-0">
            <i class="bi bi-journal-text fs-2"></i> Your Lists
          </h1>
          <div class="d-flex gap-2">
            <!-- Sort Dropdown -->
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-sort-alpha-down me-1"></i>Sort
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortDropdown">
                <li>
                  <a class="dropdown-item <?php echo $sortDirection === 'asc' ? 'active' : ''; ?>" 
                     href="lists.php?id=<?php echo htmlspecialchars($userId); ?>&sort=asc">
                    <i class="bi bi-sort-alpha-down me-2"></i>A to Z
                  </a>
                </li>
                <li>
                  <a class="dropdown-item <?php echo $sortDirection === 'desc' ? 'active' : ''; ?>" 
                     href="lists.php?id=<?php echo htmlspecialchars($userId); ?>&sort=desc">
                    <i class="bi bi-sort-alpha-up me-2"></i>Z to A
                  </a>
                </li>
              </ul>
            </div>
            
            <!-- Add New List Button -->
            <button type="button" class="btn btn-light" onclick="location.href='addList.php'">
              <i class="bi bi-plus-square me-2"></i>Add New List
            </button>
          </div>
        </div>

        <div class="row g-4">
          <?php foreach ($lists as $list): ?>
            <div class="col-12">
              <div class="bg-secondary rounded d-flex justify-content-between align-items-center p-4 shadow-sm">
                <div class="text-title fs-5 fw-semibold">
                  <a href="list.php?id=<?php echo $list['id']; ?>" class="text-decoration-none text-title">
                    <i class="bi bi-list-ul me-2"></i><?php echo htmlspecialchars($list['name']); ?>
                  </a>
                </div>

                <?php if ($list['name'] !== 'Bookmarks'): ?>
                  <div class="d-flex align-items-center gap-3">
                    <a href="editList.php?id=<?php echo htmlspecialchars($list['id']); ?>" class="text-light">
                      <i class="bi bi-pencil fs-5"></i>
                    </a>

                    <form method="POST" action="lists.php?id=<?php echo htmlspecialchars($userId); ?><?php echo isset($_GET['sort']) ? '&sort=' . htmlspecialchars($_GET['sort']) : ''; ?>" class="m-0">
                      <input type="hidden" name="list_id_to_delete" value="<?php echo htmlspecialchars($list['id']); ?>">
                      <button type="submit" style="border: none; background: none; color: #ddd;">
                        <i class="bi bi-trash3 fs-5"></i>
                      </button>
                    </form>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

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