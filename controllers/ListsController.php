<?php
require_once '../../models/client.php';
require_once '../../models/list.php';
require_once '../../controllers/DBController.php';
class ListsController{
    public static function getLists($userId){
        $list = new Lists();
        $result = $list->getLists($userId) ;
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else if(count($result) === 0) {
            header('location: ../views/Shared/404.php');
        }
        else {
            return $result;
        }          
    }
    public static function addList(Lists $newList){
        $userId = $newList->getUserId();
        $result = $newList->addList($newList);
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else {
            header("Location: ../views/client/lists.php?id=<?php echo htmlspecialchars($userId); ?>");
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
    public static function editlist(Lists $list){
        $userId = $list->getUserId();
        $result = $list->editList($list);
        if($result === false) {
            echo 'Error in query';
            return false;
        } 
        else {
            header("Location: lists.php?userId=" . htmlspecialchars($userId));           
            return true;
        } 
    }

    public static function fetchListArticles($listId){
        $list = new Lists;

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

    public static function removeArticleFromList( $listId,$articleId){

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








}



?>
