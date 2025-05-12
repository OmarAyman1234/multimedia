<?php

require_once '../../models/article.php';
require_once '../../models/translation.php';
require_once '../../models/interaction.php';
require_once '../../controllers/DBController.php';
require_once '../../models/category.php';
require_once '../../controllers/AuthController.php';
require_once '../../views/utils/alert.php';

class ArticleController {
  public static function getAllArticles(){
    return article::getAllArticles();
  }

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

      Alert::setAlert('success', "Article #$articleId removed");
      
      header('location: ../../views/Shared/');
      exit;
    }
    else {
      Alert::setAlert('danger', "Only admins can delete articles");
      
      header('location: ../../views/auth/login.php');
      exit;
    }
    
  }
  public static function highlightKeyword($articleId, $keyword) {
    $article = self::getArticle($articleId);
    $content = $article->getContent();

    if (stripos($content, $keyword) !== false) {
        $highlighted = preg_replace(
            "/(" . preg_quote($keyword, "/") . ")/i",
            '<span style="background-color: yellow; color: black;">$1</span>',
            $content
        );
        return $highlighted;
    }

    return false;
}
public static function updateArticle($articleId, $title, $content) {
    if(AuthController::isEditor()) {
      Article::updateArticle($articleId, $title, $content);

      Alert::setAlert('success', "Article #$articleId updated");
      
       header('location: ../../views/Shared/article.php?id='.$articleId);
      exit;
    }
    else {
      Alert::setAlert('danger', "Only admins&editors can update articles");
      
      header('location: ../../views/auth/login.php');
      exit;
    }
  }

}
?>