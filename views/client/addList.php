<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once "../../controllers/ListController.php";
    require_once "../../controllers/"
    if(isset($_POST['listName']))
    {
      if(!empty($_POST['listName']))
      {
        $listName = $_POST["listName"];
        $listID = $_SESSION['userId'];
        ListController::addList($listID,  $listName);
        header("Location: lists.php");
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />
    <?php require_once '../utils/linkTags.php' ?>
  </head>

  <body>
    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner Start -->
      <?php require_once '../utils/spinner.php'?>
      <!-- Spinner End -->

      <!-- Sign In Start -->
      <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
          <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="index.html">
                  <h3 class="text-primary">
                    Add List
                  </h3>
                </a>
              </div>

              <form action="addList.php" method="POST"> 
  <div class="form-floating mb-3">
    <input type="text" name="listName" class="form-control" id="floatingInput" placeholder="text" />
    <label for="floatingInput">List Name </label>
  </div>

                </div>

                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                        Add

                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
    </div>

    <?php require_once '../utils/scripts.php' ?>
  </body>
</html>