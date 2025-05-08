<?php
require_once '../../controllers/DBController.php';
require_once '../../controllers/AuthController.php';
require_once '../../models/interaction.php';

if(session_status() === PHP_SESSION_NONE)
  session_start();

class InteractionController {
  public static function addComment($content, $articleId, $userId) {

    if(AuthController::isLoggedIn()) {
      Interaction::addComment($content, $articleId, $userId);
      header("location: ../../views/Shared/article.php?id=$articleId");
      exit;
    }
    else {
      header('location: ../../views/auth/login.php');
      exit;
    }   
  }

  public static function getComment($commentId) {
    $db = new DBController;
    if($db->openConnection()) {
      $query = "SELECT * FROM interactions WHERE id=$commentId";
      $result = $db->select($query);

      if($result === false) {
        $_SESSION['errMsg'] = 'Error in query';
        return false;
      } 
      else if(count($result) === 0) {
        return false;
      } 
      else {
        return $result;
      }
    }

  }

  public static function editComment($commentId, $newEdit) {
    $db = new DBController;
    if($db->openConnection()) {
      $query = "UPDATE interactions SET content = '$newEdit' WHERE interactions.id = $commentId";
      $result = $db->update($query);

      return $result; // Returns true or false.
    }
  }

  public static function deleteComment($commentId, $userId) {
    //userId is needed to check that the comment if the user's, not another user's comment.
    $db = new DBController;
    if($db->openConnection()) {
      if($userId == $_SESSION['userId']) {
        $query = "SELECT * FROM interactions where id=$commentId and userId=$userId";
      }
      else {
        $_SESSION['errMsg'] = 'Unauthorized to delete that comment';
      }
    }
  }
}
?>