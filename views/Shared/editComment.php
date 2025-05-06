<?php
    require_once "../../controllers/InteractionController.php";

    if(session_status() === PHP_SESSION_NONE)
      session_start();


    $id = $_GET['id'];
    if (!$id) {
      header('location: 404.php');
      exit;
    }

    $comment = InteractionController::getComment($id);
    if(!$comment || empty($comment[0]['content'])) {
      //if the content is empty, that's a like.
      header('location: 404.php');
    }

    if(isset($_POST['editedComment']))
    {
      if(!empty($_POST['editedComment']))
      {
        if(InteractionController::editComment($id, $_POST['editedComment']))
          header("location: article.php?id=" . $comment[0]['articleId']);
      }
      else {
        $_SESSION['errMsg'] = 'Comment cannot be empty!';
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


      
      
      <!-- Edit Comment Start -->
      <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
          <!-- Adjusting the width of the column container -->
          <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
              <div class="d-flex flex-column align-items-center justify-content-between mb-3">

                <?php if (isset($_SESSION['errMsg']) && !empty($_SESSION['errMsg'])): ?>
                  <div class="alert w-100 alert-danger" role="alert">
                    <?= $_SESSION['errMsg'] ?>
                  </div>
                  <?php unset($_SESSION['errMsg']); ?> <!-- Clear the session message after it's shown -->
                <?php endif; ?>

                <h3 class="text-primary">
                  Edit Comment
                </h3>
              </div>
              
        <form action="editComment.php?id=<?= $id ?>" method="POST"> 
          <div class="mb-4">
            <textarea 
              name="editedComment" 
              class="form-control bg-dark border-0 text-light" 
              placeholder="Edit your comment"
              style="min-height: 150px; height: auto; resize: none; padding: 12px; font-size: 16px; width: 100%;"
            ><?= htmlspecialchars($comment[0]['content']) ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100 py-3">
            Save Changes
          </button>
        </form>
      </div>
    </div>
  </div>
</div>




    <?php require_once '../utils/scripts.php' ?>
  </body>
</html>