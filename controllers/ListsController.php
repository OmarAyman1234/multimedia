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

    public static function addArticleToBookmarks($articleId) {
        if(AuthController::isLoggedIn()) {
            $userId = $_SESSION['userId'];
            
            // Check if article is already bookmarked
            if(Lists::isArticleBookmarked($articleId, $userId)) {
                // Article is already bookmarked, so remove it
                if(Lists::removeArticleFromBookmarks($articleId, $userId)) {
                    header("location: ../../views/Shared/article.php?id=$articleId");
                    return true;
                }
            } else {
                // Article is not bookmarked, add it
                if(Lists::addArticleToBookmarks($articleId, $userId)) {
                    header("location: ../../views/Shared/article.php?id=$articleId");
                    return true;
                }
            }
            
            header("location: ../../views/Shared/article.php?id=$articleId");
            return false;
        }
        else {
            header('location: ../../views/auth/login.php');
            exit;
        }
    }

    public static function isArticleBookmarked($articleId) {
        if(AuthController::isLoggedIn()) {
            if(Lists::isArticleBookmarked($articleId, $_SESSION['userId'])) {
                return true;
            }
        }
        return false;
    }

    public static function addArticleToList($articleId, $listId) {
        if(AuthController::isLoggedIn()) {
            $userId = $_SESSION['userId'];
            
            // Verify that the list belongs to the current user
            $lists = Lists::getLists($userId);
            $userListIds = array_column($lists, 'id');
            
            if(in_array($listId, $userListIds)) {
                if(Lists::addArticleToList($listId, $articleId)) {
                    header("location: ../../views/Shared/article.php?id=$articleId");
                    return true;
                }
            }
            
            header("location: ../../views/Shared/article.php?id=$articleId");
            return false;
        }
        else {
            header('location: ../../views/auth/login.php');
            exit;
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
