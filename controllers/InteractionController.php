<?php
require_once '../../controllers/DBController.php';
require_once '../../controllers/AuthController.php';
require_once '../../models/interaction.php';
require_once '../../views/utils/alert.php';

if(session_status() === PHP_SESSION_NONE)
  session_start();

class InteractionController {
  public static function addComment($content, $articleId, $userId) {

    if(AuthController::isLoggedIn()) {
      Interaction::addComment($content, $articleId, $userId);

      Alert::setAlert("success", "Comment added!");
      
      header("location: ../../views/Shared/article.php?id=$articleId");
      exit;
    }
    else {
      Alert::setAlert("danger", "You need to be logged in to add a comment!");

      header('location: ../../views/auth/login.php');
      exit;
    }   
  }

  public static function getComment($commentId) {
    $result = Interaction::getComment($commentId);

    if(empty($result)) {
      return [];
    }

    return $result;
  }

  public static function editComment(Interaction $comm, $newEdit) {
    if(AuthController::isLoggedIn()) {
      if($comm->getUserId() == $_SESSION['userId'] || AuthController::isAdmin()) {
        Interaction::editComment($comm->getId(), $newEdit);

        Alert::setAlert('success', 'Comment edited');
      }
      else {
        Alert::setAlert('danger', 'Cannot edit other users comments!');
      }
      header('location: article.php?id=' . $comm->getArticleId());
      exit;
    }
    else {
      Alert::setAlert('danger', 'Unauthorized!');
      header('location: ../../views/Shared/404.php');
      exit;
    }
  }

  public static function deleteComment(Interaction $comm) {
    //userId is needed to check that the comment if the user's, not another user's comment.
    if(AuthController::isLoggedIn()) {
      if($_SESSION['userId'] == $comm->getUserId() || AuthController::isAdmin()) {
        Interaction::deleteComment($comm->getId());
        Alert::setAlert('light', 'Comment deleted');
      }
      else {
        Alert::setAlert('danger', 'Cannot delete other users comments');
      }
      
      header('location: ../../views/Shared/article.php?id=' . $comm->getArticleId());
      exit;
    }
    else {
      Alert::setAlert('danger', 'Unauthorized!');
      header("location: ../../views/auth/login.php");
      exit;
    }
   
  }

  public static function addLike($articleId) {
    if(AuthController::isLoggedIn()) {
        $userId = $_SESSION['userId'];
        
        // Check if article is already liked
        if(Interaction::isArticleLiked($articleId, $userId)) {
            // Article is already liked, so remove it
            if(Interaction::removeLike($articleId, $userId)) {
                header("location: ../../views/Shared/article.php?id=$articleId");
                return true;
            }
        } else {
            // Article is not liked, add it
            if(Interaction::addLike($articleId, $userId)) {
                header("location: ../../views/Shared/article.php?id=$articleId");
                return true;
            }
        }
    }
    else {
        header('location: ../../views/auth/login.php');
        exit;
    }
  }

  public static function isArticleLiked($articleId) {
      if(AuthController::isLoggedIn()) {
          if(Interaction::isArticleLiked($articleId, $_SESSION['userId'])) {
              return true;
          }
      }
      return false;
  }
}
?>