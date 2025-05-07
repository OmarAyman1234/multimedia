<?php

require_once '../../models/article.php';
require_once '../../models/interaction.php';
require_once '../../controllers/DBController.php';

class ArticleController {

  public static function getArticle($articleId) {
    if(!$articleId) {
      header('location: ../../views/Shared/404.php');
      exit;
    }

    //model function
    $article = Article::getArticleById($articleId);

    if($article === false) {
      header('location: ../../views/Shared/404.php');
      exit;
    } 
    else {
      return $article;
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

  public static function getArticleLikesCount($articleId) {
    return Interaction::getArticleLikesCount($articleId);
  }

  public static function getArticleComments($articleId) {
    return Interaction::getArticleComments($articleId);
  }
  
  public function getAllArticles(){
    $db=new DBController;
    if($db->openConnection()){
      $quary="select articles.id,articles.image,articles.title,articles.content,articles.categoryId,categories.name as categoryName from articles join categories on categories.id=articles.categoryId";
      return $db->select($quary);
    }
    else{
      echo "Error in connection";
      return false;
    }
  }
  public function getCategory(){
    $db=new DBController;
    if($db->openConnection()){
      $quary="select * from categories";
      return $db->select($quary);
    }
    else{
      echo "Error in connection";
      return false;
    }
  }
  public function getArticlesByCategory($categoryId){
    $db=new DBController;
    if($db->openConnection()){
      $quary="select articles.id,articles.image,articles.title,articles.content,articles.categoryId,categories.name as categoryName from articles join categories on categories.id=articles.categoryId where articles.categoryId=$categoryId";
      return $db->select($quary);
    }
    else{
      echo "Error in connection";
      return false;
    }
  }
}


?>