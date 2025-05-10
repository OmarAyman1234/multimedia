<?php

require_once '../../models/article.php';
require_once '../../models/translation.php';
require_once '../../models/interaction.php';
require_once '../../controllers/DBController.php';
require_once '../../models/category.php';

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
    return Translation::getArticleTranslations($articleId);
  }

  public static function getArticleLikesCount($articleId) {
    return Interaction::getArticleLikesCount($articleId);
  }

  public static function getArticleComments($articleId) {
    return Interaction::getArticleComments($articleId);
  }

  public static function removeArticle($articleId) {
    if(AuthController::isAdmin()) {
      Article::removeArticle($articleId);
      header('location: ../../views/Shared/');
      exit;
    }
    else {
      header('location: ../../views/auth/login.php');
      exit;
    }
    
  }
}
?>