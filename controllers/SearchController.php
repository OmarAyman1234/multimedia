<?php

require_once '../../models/article.php';
require_once '../../models/translation.php';
require_once '../../models/interaction.php';
require_once '../../controllers/DBController.php';
require_once '../../models/category.php';

class SearchController {
   
    public static function getArticleByTitle($title){
        $article=new article();
        $article->setTitle($title);
        return $article->getArticleByTitle($article);
    }
    public static function getCategoryByArticleId($articleId){
        $category=new category();
        $category->setId($articleId);
        return $category->getCategoryByArticleId($category);
    }
    
}