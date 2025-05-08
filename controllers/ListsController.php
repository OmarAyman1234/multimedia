<?php
require_once '../../models/client.php';
require_once '../../models/list.php';
require_once '../../controllers/DBController.php';
require_once '../../controllers/AuthController.php';

class ListsController{
    public static function getList($listId) {
        if(AuthController::isLoggedIn()) {
            $result = Lists::getList($listId);

            if($result === false) {
                echo 'Error in query';
                return false;
            } 
            else {
                return $result;
            }          
        }
        else {
            $_SESSION['errMsg'] = 'Unauthorized!';
        }
    }
    public static function getLists($userId){
        if(AuthController::isLoggedIn() && $_SESSION['userId'] == $userId) {

            $result = Lists::getLists($userId);
    
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
        else {
            $_SESSION['errMsg'] = 'Unauthorized!';
        }
    }
    public static function addList(Lists $newList){
        $userId = $newList->getUserId();
        if(AuthController::isLoggedIn() && $_SESSION['userId'] == $userId) {
            
            $result = $newList->addList($newList);
            if($result === false) {
                echo 'Error in query';
                return false;
            } 
            else {
                header("Location: ../../views/client/lists.php?id=$userId");
                return $result;
            } 
        }
        else {
            $_SESSION['errMsg'] = 'Unauthorized!';
        }
    }
    public static function deleteList($listId){
        if(AuthController::isLoggedIn()) {
            $list = new Lists();
            $result = $list->deleteList($listId);
            if($result === false) {
                echo 'Error in query';
                return;
            } 
            else {
                // session started before when checking if the user is logged in
                header("Location: ../../views/client/lists.php?id=" . $_SESSION['userId']);           
                return $result;
            }        
        } 
        else {
            $_SESSION['errMsg'] = 'Unauthorized!';
        }
    }
    public static function editlist(Lists $list){
        $userId = $list->getUserId();
        if(AuthController::isLoggedIn() && $_SESSION['userId'] == $userId) {
            $result = $list->editList($list);
            if($result === false) {
                echo 'Error in query';
                return false;
            } 
            else {
                header("Location: ../../views/client/lists.php?id=$userId");           
                return true;
            } 
        } 
        else {
            $_SESSION['errMsg'] = 'Unauthorized!';
        }
    }

    public static function fetchListArticles($listId){
        $list = new Lists;

        $result = $list->getListArticles($listId);
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

    public static function removeArticleFromList($listId, $articleId){

        if(AuthController::isLoggedIn()) {
            $li = new Lists();
            $result = $li->removeArticleFromList($listId, $articleId);
            if($result === false) {
                echo 'Error in query';
                return;
            } 
            else {
                return $result;
            } 
        }
        else {
            $_SESSION['errMsg'] = 'Unauthorized!';
        }

    }








}



?>
