<?php
require_once '../../models/client.php';
require_once '../../controllers/DBController.php';
class ListController{
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

    public static function deleteList($listId){
        $list = new Lists();        
        $result = $list->deleteList($listId);
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

    public static function fetchArticles($listId){
        $list = new Lists();
        $result = $list->getListArticles($listId);
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








}



?>
