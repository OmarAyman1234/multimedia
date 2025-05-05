<?php
require_once '../../controllers/DBController.php';
require_once '../../models/interaction.php';

class InteractionController {
  public static function addComment(Interaction $i, $articleId) {
    $db = new DBController;
    $db->openConnection();

    if(!isset($_SESSION['userId'])) {
      exit;
    }

    if(empty($i->getContent())) {
      echo 'Comment cannot be empty!';
      exit;
    }

    $typeId = $i->getTypeId();
    $content = $i->getContent();
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO interactions (typeId, content, userId, articleId) VALUES ($typeId, '$content', $userId, $articleId)";
    $result = $db->insert($query);

    if($result === false) {
      echo "Error in query";
      return false;
    } 
    
    else {
      header("location: article.php?id=$articleId");
      return $result; // Result is the last inserted ID.
    }

  }
}
?>