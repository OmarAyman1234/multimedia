<?php
      require_once "../../controllers/ListsController.php";
      require_once "../../controllers/AuthController.php";
      require_once "../../views/utils/alert.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $userId = $_SESSION['userId'];

    if(isset($_POST['listName']))
    {
      if(!empty($_POST['listName']))
      {
        $newList = new Lists();
        $newList->setListName($_POST["listName"]);
        $newList->setUserId($_SESSION['userId']);
        ListsController::addList($newList);
      } 
      else {
        Alert::renderAlert('danger', 'List name cannot be empty');
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Add List</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="DarkPan Admin Panel" name="keywords" />
    <meta content="Create a new list in your collection" name="description" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />
    <?php require_once '../utils/linkTags.php' ?>
  </head>

  <body>

    <?php Alert::renderAlert() ?>

    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner Start -->
      <?php require_once '../utils/spinner.php'?>
      <!-- Spinner End -->

      <!-- Add List Form Start -->
      <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
          <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="text-primary mb-0">
                  <i class="fa fa-list-alt me-2"></i>Add New List
                </h3>
                <a href="lists.php?id=<?=$userId?>" class="btn btn-sm btn-outline-primary">
                  <i class="fa fa-times"></i>
                </a>
              </div>
              
              <form action="addList.php" method="POST"> 
                <div class="form-floating mb-4">
                  <input 
                    type="text" 
                    name="listName" 
                    class="form-control bg-dark border-0 text-light" 
                    id="floatingInput" 
                    placeholder="My List Name"
                    required
                  />
                  <label for="floatingInput" class="text-muted">List Name</label>
                </div>
                
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary py-3 mb-2">
                    <i class="fa fa-plus-circle me-2"></i>Create List
                  </button>
                </div>
              </form>
              
              <div class="text-center mt-4">
                <small class="text-muted">Create personalized lists to organize your content</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Add List Form End -->
    </div>

    <?php require_once '../utils/scripts.php' ?>
  </body>
</html>