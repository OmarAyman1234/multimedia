<?php

require_once '../../controllers/DBController.php';

class Article {
  private $id;
  private $title;
  private $image;
  private $content;
  private $categoryId;
  private $categoryName;
  private $editorId;
  private $editorUsername;
  private $isEdited;
  private $publishDate;
  
  public function __construct(array $data = []) {
    if (isset($data['id'])) $this->id = $data['id'];
    if (isset($data['title'])) $this->title = $data['title'];
    if (isset($data['image'])) $this->image = $data['image'];
    if (isset($data['content'])) $this->content = $data['content'];
    if (isset($data['categoryId'])) $this->categoryId = $data['categoryId'];
    if (isset($data['categoryName'])) $this->categoryName = $data['categoryName'];
    if (isset($data['editorId'])) $this->editorId = $data['editorId'];
    if (isset($data['editorUsername'])) $this->editorUsername = $data['editorUsername'];
    if (isset($data['isEdited'])) $this->isEdited = $data['isEdited'];
    if (isset($data['publishDate'])) $this->publishDate = $data['publishDate'];
  }


  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->id = $id;
  }

  public function getTitle() {
    return $this->title;
  }
  public function setTitle($newTitle) {
    $this->title = $newTitle;
  }

  public function getImage() {
    return $this->image;
  }
  public function setImage($newImg) {
    $this->image = $newImg;
  }

  public function getContent() {
    return $this->content;
  }
  public function setContent($newContent) {
    $this->content = $newContent;
  }

  public function getCategoryId() {
    return $this->categoryId;
  }
  public function setCategoryId($newId) {
    $this->categoryId = $newId;
  }

  public function getCategoryName() {
      return $this->categoryName;
  }
  public function setCategoryName($name) {
      $this->categoryName = $name;
  }

  
  public function getEditorId() {
    return $this->editorId;
  }
  public function setEditorId($id) {
    $this->editorId = $id;
  }
  
  public function getEditorUsername() {
    return $this->editorUsername;
  }
  public function setEditorUsername($username) {
    $this->editorUsername = $username;
  }

  public function getIsEdited() {
    return $this->isEdited;
  }
  public function setIsEdited() {
    $this->isEdited = !$this->isEdited;
  }

  public function getPublishDate() {
    return $this->publishDate;
  }
  public function setPublishDate($date) {
    $this->publishDate = $date;
  }

  public static function getArticleById($articleId) {
    $query = "SELECT a.*, rg.username AS editorUsername, cat.name AS categoryName FROM articles AS a JOIN registeredUsers AS rg ON a.editorId = rg.id JOIN categories AS cat ON cat.id = a.categoryId WHERE a.id=$articleId AND a.isDeleted=0";
    $result = DBController::select($query);

    if($result) {
      $article = new Article($result[0]);
      return $article;
    } 
    else {
      return false;
    }
  }
  public static function getAllArticles(){
      $quary="select articles.id,articles.image,articles.title,articles.content,articles.categoryId,categories.name as categoryName,username,profilePicture,publishDate from articles join categories on categories.id=articles.categoryId join registeredUsers on registeredUsers.id=articles.editorId where articles.isDeleted=0 ";
      $result=DBController::select($quary);
      if($result){
        return $result;
      }
      else{
        return false;
      }
  }
  public static function shuffleArticles($articles) {
    shuffle($articles);
    return $articles;
  }
  public static function getShuffledArticles($articles) {
    $shuffledArticles = self::shuffleArticles($articles);
    return array_slice($shuffledArticles, 0, 4);
  }
  public function getArticleByTitle(article $article) {
    $title = $article->getTitle();
    $query = "SELECT * FROM articles WHERE title='$title'";
    $result = DBController::select($query);

    if($result) {
      return new Article($result[0]);
    } 
    else {
      return false;
    }
  }
  public static function getArticlesByKeyword($keyword) {
    $query = "SELECT * FROM articles WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
    $result = DBController::select($query);

    if($result) {
      return $result;
    } 
    else {
      return false;
    }
  }

  public static function removeArticle($articleId) {
    $query = "UPDATE articles SET isDeleted=1 WHERE id=$articleId";
    return DBController::update($query);
  }
  public static function highlightKeyword($content,$keyword) {
    $highlightedContent = preg_replace("/($keyword)/i", "<span class='highlight'>$1</span>", $content);
    return $highlightedContent;
  }
  public static function updateArticle($articleId, $title, $content) {
    $query = "UPDATE articles SET title='$title', content='$content' WHERE id=$articleId";
    return DBController::update($query);
  }
  public static function addArticle($title, $content,$image, $editorId ,$categoryId) {
     $query = "INSERT INTO articles (title, content, image, editorId, categoryId)VALUES('$title', '$content','$image', $editorId,$categoryId)";
    return DBController::insert($query);
  }
  
}

?>