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

    public static function getList($listId) {
        $query = "SELECT * FROM lists WHERE id=$listId";
        $result = DBController::select($query);
        return $result;
    }

    public function editList(Lists $list){
        $listId = $list->getListId();
        $listNewName = $list->getListName();
        $query = "UPDATE `lists` SET `name`='$listNewName' WHERE id = $listId";
        $result = DBController::delete($query);
        return $result;
    }

    public static function getLists($userId){
        $query = "SELECT * FROM lists WHERE isDeleted = 0 and userId= $userId";
        $result = DBController::select($query);
        return $result;
    }

    public function addList(Lists $list){
        $listName = $list->getListName();
        $userId = $list->getUserId();
        $query = "INSERT INTO lists (name, userId) VALUES ('$listName', $userId)"; 
        $result = DBController::insert($query);
        return $result;
    }
    
    public function deleteList($listId){
        $query = "UPDATE lists SET isDeleted = 1 WHERE id = $listId";
        $result = DBController::delete($query);
        return $result !== false;
    }

    public function getListArticles($listId){
        $query = "SELECT a.id AS article_id, a.title, a.content, a.image 
        FROM articles a 
        JOIN lists_articles la ON a.id = la.articleId 
        WHERE la.listId = $listId";
        $result = DBController::select($query);
        return $result;
    }

    public  function removeArticleFromList($listId, $articleId){
        $query = "DELETE FROM lists_articles WHERE articleId = $articleId and listId = $listId";
        $result = DBController::delete($query);
        return $result;
    }

    public static function getBookmarksId($userId) {
        $getBookmarks = "SELECT * FROM lists WHERE userId=$userId AND name='Bookmarks'";
        $bookmarksResult = DBController::select($getBookmarks);
        return $bookmarksResult ? $bookmarksResult[0]['id'] : false;
    }

    public static function addArticleToBookmarks($articleId, $userId) {
        $listId = self::getBookmarksId($userId);
        $articleAddition = "INSERT INTO lists_articles (listId, articleId) VALUES ($listId, $articleId)";
        $result = DBController::insert($articleAddition);
        return $result !== false; // Insert ID in this mixed table is zero so the previous version will validate to false if used with if "if(0)"
    }

    public static function removeArticleFromBookmarks($articleId, $userId) {
        $bookmarksId = self::getBookmarksId($userId);
        if (!$bookmarksId) return false;
        
        $query = "DELETE FROM lists_articles WHERE listId=$bookmarksId AND articleId=$articleId";
        $result = DBController::delete($query);
        return $result;
    }

    public static function isArticleBookmarked($articleId, $userId) {
        $bookmarksId = self::getBookmarksId($userId);

        $query = "SELECT * FROM lists_articles WHERE listId=$bookmarksId AND articleId=$articleId";
        $result = DBController::select($query);

        if(!empty($result)) 
            return true;

        return false;
    }

    public static function addArticleToList($listId, $articleId) {
        // First check if article is already in the list
        $checkQuery = "SELECT * FROM lists_articles WHERE listId=$listId AND articleId=$articleId";
        $checkResult = DBController::select($checkQuery);
        
        if(!empty($checkResult)) {
            // Article already exists in this list
            return false;
        }
        
        // Add article to list
        $query = "INSERT INTO lists_articles (listId, articleId) VALUES ($listId, $articleId)";
        $result = DBController::insert($query);
        return $result;
    }
    
    public static function getUserListsExceptBookmarks($userId) {
        $query = "SELECT * FROM lists WHERE isDeleted = 0 AND userId = $userId AND name != 'Bookmarks'";
        $result = DBController::select($query);
        return $result;
    }
}

?>