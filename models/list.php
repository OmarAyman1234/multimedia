<?php 

class Lists {
    private $listName;
    private $listId;
    private $userId;
    
    public function setListId($id){
        $this->listId = $id;
    }
    public function setListName($name){
        $this->listName = $name;
    }
    public function setUserId($id){
        $this->userId = $id;
    }

    public function getListId(){
        return $this->listId;  
    }
    public function getListName(){
        return $this->listName; 
    }
    public function getUserId(){
        return $this->userId;  
    }

    public function editList(Lists $list ){
        $listId = $list->getListId();
        $listNewName = $list->getListName();
        $query = "UPDATE `lists` SET `name`='$listNewName' WHERE id = '" . $listId . "'";
        $result = DBController::delete($query);
        return $result;
    }

    public function getLists($userId){
        $query = "SELECT * FROM lists WHERE isDeleted = 0 and userId='" . $userId . "'";
        $result =  DBController::select($query);
        return $result;
    }

    public function addList(Lists $list){
        $listName = $list->getListName();
        $userId = $list->getUserId();
        $query = "INSERT INTO lists (name, userId) VALUES ('$listName', '$userId')"; 
        $result = DBController::insert($query);
        return $result;
    }
    
    public function deleteList($listId){
        $query = "UPDATE lists SET isDeleted = 1 WHERE id = '" . $listId . "'";
        $result = DBController::delete($query);
        return $result;
    }

    public function getListArticles($listId){
        $query = "SELECT a.id AS article_id, a.title, a.content, a.image 
        FROM articles a 
        JOIN lists_articles la ON a.id = la.articleId 
        WHERE la.listId = " . $listId;
        $result = DBController::select($query);
        return $result;
    }

    public  function removeArticleFromList( $listId,$articleId){
        $query = "DELETE FROM lists_articles WHERE articleId = " . $articleId . " and listId = " . $listId;
        $result = DBController::delete($query);
        return $result;
    }
}

?>