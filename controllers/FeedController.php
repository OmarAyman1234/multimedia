<?php

require_once '../../models/article.php';
require_once '../../models/translation.php';
require_once '../../models/interaction.php';
require_once '../../controllers/DBController.php';
require_once '../../models/category.php';

class FeedController {
    public static function getAllArticles(){
        return article::getAllArticles();
      }
      public static function getAllCategory(){
        return category::getAllCategory();
      }
      public static function getArticlesByCategory($categoryId){
        
        $category=new category();
        $category->setId($categoryId);
        return $category->getArticlesByCategory($category);
    }
}