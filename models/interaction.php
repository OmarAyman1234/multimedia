<?php
require_once '../../controllers/DBController.php';

class Interaction {
  private $id;
  private $typeId; //1: Like, 2: Comment
  private $date;
  private $content; // If empty: like, else a comment.
  private $userId;
  private $articleId;
  private $isDeleted;
  private $username;
  private $userProfilePic;

  public function __construct(array $data = [])
  {
    if(isset($data['id'])) $this->id = $data['id'];
    if(isset($data['typeId'])) $this->typeId = $data['typeId'];
    if(isset($data['date'])) $this->date = $data['date'];
    if(isset($data['content'])) $this->content = $data['content'];
    if(isset($data['userId'])) $this->userId = $data['userId'];
    if(isset($data['articleId'])) $this->articleId = $data['articleId'];
    if(isset($data['isDeleted'])) $this->isDeleted = $data['isDeleted'];
    if(isset($data['username'])) $this->username = $data['username'];
    if(isset($data['userProfilePic'])) $this->userProfilePic = $data['userProfilePic'];
  }

  // Getters
  public function getId() {
    return $this->id;
  }

  public function getTypeId() {
    return $this->typeId;
  }

  public function getDate() {
    return $this->date;
  }

  public function getContent() {
    return $this->content;
  }

  public function getUserId() {
    return $this->userId;
  }

  public function getArticleId() {
    return $this->articleId;
  }

  public function getIsDeleted() {
    return $this->isDeleted;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getUserProfilePic() {
    return $this->userProfilePic;
  }

  // Setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setTypeId($typeId) {
    $this->typeId = $typeId;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function setContent($content) {
    $this->content = $content;
  }

  public function setUserId($userId) {
    $this->userId = $userId;
  }

  public function setArticleId($articleId) {
    $this->articleId = $articleId;
  }

  public function setIsDeleted($isDeleted) {
    $this->isDeleted = $isDeleted;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function setUserProfilePic($userProfilePic) {
    $this->userProfilePic = $userProfilePic;
  }

  public static function getArticleLikesCount($articleId) {
    $query = "SELECT i.typeId FROM interactions as i WHERE typeId=1 and i.articleId=$articleId";
    $result = DBController::select($query);
    
    return empty($result) ? 0 : count($result);
  }
  
  public static function getArticleComments($articleId) {
    $query = "SELECT i.*, u.username as username, u.profilePicture as userProfilePic FROM interactions as i JOIN registeredusers as u ON u.id=i.userId WHERE typeId=2 and i.articleId=$articleId and i.isDeleted=0";
    $result = DBController::select($query);

    if(empty($result)) {
      return [];
    }

    $comments = [];

    foreach ($result as $row) {
      $interaction = new Interaction($row);
      $comments[] = $interaction;
    }

    return $comments;
  }

  public static function getComment($commentId) {
    $query = "SELECT * FROM interactions WHERE id=$commentId";
    $result = DBController::select($query);

    if(empty($result)) {
      return null;
    }

    return new Interaction($result[0]);
  }

  public static function addComment($content, $articleId, $userId) {
    $query = "INSERT INTO interactions (typeId, content, userId, articleId) VALUES (2, '$content', $userId, $articleId)";
    $result = DBController::insert($query);

    return $result;
  }

  public static function editComment($commentId, $newEdit) {
    $query = "UPDATE interactions SET content = '$newEdit' WHERE interactions.id = $commentId";
    $result = DBController::update($query);
    return $result;
  }

  public static function deleteComment($commentId) {
    $query = "UPDATE interactions SET isDeleted=1 WHERE id=$commentId";
    $result = DBController::delete($query);
    return $result;
  }
}

?>
