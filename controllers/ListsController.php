<?php
require_once '../../models/client.php';
require_once '../../controllers/DBController.php';
class ListsController{
    public static function getLists($userId){
        $db = new  DBController;
        $db->openConnection();
        $query = "SELECT * FROM lists WHERE isDeleted = 0 and userId='" . $userId . "'";
        $result =  $db->select($query);
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
    public static function addList($listId, $listName){
        $db = new  DBController;
        $db->openConnection();
        $query = "INSERT INTO lists (name, userId) VALUES ('$listName', '$listId')"; 
        $result = $db->insert($query);
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else {
            return $result;
        } 

    }
    public static function deleteList($listId){
        $db = new  DBController;
        $db->openConnection();
        $query = "UPDATE lists SET isDeleted = 1 WHERE id = '" . $listId . "'";
        $result = $db->delete($query);
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else {
            return $result;
        }        

    }
    public static function editlist($listId, $newName){
        $db = new DBController;
        $db->openConnection();
        $query = "UPDATE `lists` SET `name`='$newName' WHERE id = '" . $listId . "'";
        $result = $db->delete($query);
        if($result === false) {
            echo 'Error in query';
            return false;
        } 
        else {
            return $result;
        } 

    }

    public static function fetchListArticles($listId){
        $db = new DBController;
        $db->openConnection(); 
        $query = "SELECT a.id AS article_id, a.title, a.content, a.image 
          FROM articles a 
          JOIN lists_articles la ON a.id = la.articleId 
          WHERE la.listId = " . $listId; // Direct embedding - DANGEROUS!
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

    public static function deleteArticle( $listId,$articleId){
        $db = new  DBController;
        $db->openConnection();
        $query = "DELETE FROM lists_articles WHERE articleId = " . $articleId . " and listId = " . $listId;
        $result = $db->delete($query);
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else {
            return $result;
        } 

    }








}



?>
