<?php

require_once '../../models/article.php';
require_once '../../models/translation.php';
require_once '../../models/interaction.php';
require_once '../../controllers/DBController.php';
require_once '../../controllers/AuthController.php';
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
    public static function getArticlesByKeyword($keyword){
        return article::getArticlesByKeyword($keyword);
    }
    public static function save($searchTerm, $userId) {
        if(AuthController::isLoggedIn()) {
            $searchHistory = new SearchHistory;
            $searchHistory->setSearchTerm($searchTerm);
            $searchHistory->setUserId($userId);
            return $searchHistory->save($searchHistory);
        }
    }
    public static function getSearchHistoryByUserId($userId) {
        $searchHistory = new SearchHistory;
        return $searchHistory->getSearchHistoryByUserId($userId);
    }
    public static function deleteSearchHistory($id) {
        $searchHistory = new SearchHistory;
        return $searchHistory->deleteSearchHistory($id);
    }
    
}