
<?php
require_once "../../controllers/ListsController.php";
require_once "../../models/list.php";

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$id = $_SESSION['userId'];
$userId = $_GET['id'];

if (!$userId) {
  header('location: ../Shared/404.php');
  exit;
}

$lists = ListsController::getLists($userId);
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
      <?php foreach ($lists as $list): ?>
      <div class="bg-secondary rounded-top p-4">
        <div class="row">
          <div class="col-12 col-sm-6 text-main text-center text-sm-start">
            <a href="list.php?id=<?php $list['id']?>"><?php echo htmlspecialchars($list['name']); ?></a>
          </div>
          <div class="col-12 col-sm-6 text-center text-sm-end text-main">
            <?php if ($list['name'] != 'Bookmarks'): ?>
              <!-- <div class="col-12 col-sm-6 text-main text-center text-sm-start"> -->
              <a href="editList.php?id=<?php echo htmlspecialchars($list['id']); ?>"><i class="bi bi-pencil"></i></a>
              <!-- </div> -->
              
              <form method="POST" action="lists.php?id=<?php $list['userId'] ?>" class="delete-form">
                <input type="hidden" name="list_id_to_delete" value="<?php $list['id'] ?>">
                <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
                  <i class="bi bi-trash3"></i>
                </button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <br>
      <?php endforeach; ?>
    </div>
    
      <button type="button" class="btn btn-light m-2" onclick="location.href='addList.php'"><i class="bi bi-plus-square"></i> Add list</button>

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
