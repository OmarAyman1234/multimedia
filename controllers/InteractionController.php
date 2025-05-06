<?php
require_once '../../controllers/DBController.php';
require_once '../../models/interaction.php';

if(session_status() === PHP_SESSION_NONE)
  session_start();

class InteractionController {
  public static function addComment(Interaction $i, $articleId) {
    $db = new DBController;
    $db->openConnection();

    if(!isset($_SESSION['userId'])) {
      exit;
    }

    if(empty($i->getContent())) {
      $_SESSION['errMsg'] = 'Comment cannot be empty!';
      exit;
    }

    $typeId = $i->getTypeId();
    $content = $i->getContent();
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO interactions (typeId, content, userId, articleId) VALUES ($typeId, '$content', $userId, $articleId)";
    $result = $db->insert($query);

    if($result === false) {
      $_SESSION['errMsg'] = "Error in query";
      return false;
    } 
    
    else {
      header("location: article.php?id=$articleId");
      return $result; // Result is the last inserted ID.
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
}
?>