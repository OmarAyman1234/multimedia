<?php

require_once '../../models/article.php';
require_once '../../controllers/DBController.php';

class ArticleController {

  public static function getArticle($articleId) {
    $db = new DBController;
    $db->openConnection();

    $query = "SELECT a.*, rg.username AS editorUsername, cat.name AS categoryName FROM articles AS a JOIN registeredUsers AS rg ON a.editorId = rg.id JOIN categories AS cat ON cat.id = a.categoryId WHERE a.id=$articleId";
    $result = $db->select($query);

    if($result === false) {
      echo 'Error in query';
      return;
    } 
    else if(count($result) === 0) {
      header('location: 404.php');
    }
    else {
      return $result;
    }
  }

  public static function getArticleTranslations($articleId) {
    $db = new DBController;
    $db->openConnection();

    $query = "SELECT t.*, l.name FROM translations as t JOIN languages as l ON t.languageId = l.id WHERE articleId=$articleId";
    $result = $db->select($query);

    if($result === false) {
      echo 'Error in query';
      return [];
    } 
    else if(count($result) === 0) {
      return [];
    }
    else {
      return $result;
    }
  }

  public static function getAvailableLanguages($articleId) {
    $db = new DBController;
    $db->openConnection();

    $query = "SELECT l.* FROM translations as t JOIN languages as l ON t.languageId = l.id WHERE articleId=$articleId";
    $result = $db->select($query);

    if($result === false) {
      echo 'Error in query';
      return [];
    } 
    else if(count($result) === 0) {
      return [];
    }
    else {
      return $result;
    }
  }
}


?>