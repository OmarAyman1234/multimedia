<?php
require_once '../../models/client.php';
require_once '../../models/list.php';
require_once '../../controllers/DBController.php';
require_once '../../controllers/AuthController.php';
require_once '../../views/utils/alert.php';

class ListsController{
    public static function getList($listId) {
        if(AuthController::isLoggedIn()) {
            return Lists::getList($listId);
        }
        else {
            Alert::setAlert('danger', 'You must be logged in!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
    public static function getLists($userId){
        if(AuthController::isLoggedIn() && $_SESSION['userId'] == $userId) {
            return Lists::getLists($userId);         
        } 
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
    public static function addList(Lists $newList){
        $userId = $newList->getUserId();
        $listName = $newList->getListName();
        
        if(AuthController::isLoggedIn() && $_SESSION['userId'] == $userId) {
            // Check if the new name is "Bookmarks" - if so, don't allow it
            if(strtolower(trim($listName)) === "bookmarks") {
                Alert::setAlert('danger', '"Bookmarks" is a reserved list name and cannot be used.');
                header("Location: ../../views/client/lists.php?id=$userId");
                exit;
            }
            
            $result = $newList->addList($newList);
            if($result) {
                Alert::setAlert('success', "List $listName created!");
                header("Location: ../../views/client/lists.php?id=$userId");
                exit;  
            } 
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
    public static function deleteList($listId){
        if(AuthController::isLoggedIn()) {
            $list = new Lists();
            $result = $list->deleteList($listId);

            if($result) {
                // session started before when checking if the user is logged in
                Alert::setAlert('light', "List deleted.");
                header("Location: ../../views/client/lists.php?id=" . $_SESSION['userId']);           
                exit;
            }        
        } 
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
    public static function editList(Lists $list){
        $userId = $list->getUserId();
        $newName = $list->getListName();
        
        if(AuthController::isLoggedIn() && $_SESSION['userId'] == $userId) {
            // Check if the new name is "Bookmarks", if so, don't allow it
            if(strtolower(trim($newName)) === "bookmarks") {
                Alert::setAlert('danger', '"Bookmarks" is a reserved list name and cannot be used.');
                // Redirect back to the lists page
                header("Location: ../../views/client/lists.php?id=$userId");
                exit;
            }
            
            if($list->editList($list)) {
                header("Location: ../../views/client/lists.php?id=$userId");           
                exit;
            } 
        }
    }

    public static function fetchListArticles($listId){
        $list = new Lists;

        if(AuthController::isLoggedIn()) {
            $result = $list->getListArticles($listId); 

            if(empty($result)) {
                return [];
            }
            else {
                return $result;
            } 
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;            
        }
    }

    public static function addArticleToBookmarks($articleId) {
        if(AuthController::isLoggedIn()) {
            $userId = $_SESSION['userId'];
            
            // Check if article is already bookmarked
            if(Lists::isArticleBookmarked($articleId, $userId)) {
                // Article is already bookmarked, so remove it
                if(Lists::removeArticleFromBookmarks($articleId, $userId)) {
                    Alert::setAlert('light', 'Article removed from bookmarks');
                    header("location: ../../views/Shared/article.php?id=$articleId");
                    exit;
                }
            } else {
                // Article is not bookmarked, add it
                if(Lists::addArticleToBookmarks($articleId, $userId)) {
                    Alert::setAlert('success', 'Article added to bookmarks');
                    header("location: ../../views/Shared/article.php?id=$articleId");
                    exit;
                }
            }
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
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
                    Alert::setAlert('success', "Article added to the list");
                }
            }
            
            header("location: ../../views/Shared/article.php?id=$articleId");
            exit;
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }

    public static function removeArticleFromList($listId, $articleId){

        if(AuthController::isLoggedIn()) {
            $li = new Lists();
            $li->removeArticleFromList($listId, $articleId);
            Alert::setAlert('light', 'Article removed from the list');
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }

    }








}



?>
