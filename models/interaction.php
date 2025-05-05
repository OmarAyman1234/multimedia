<?php

class Interaction {
  private $id;
  private $typeId;
  private $date;
  private $content; // If empty: like, else a comment.
  private $userId;
  private $articleId;
  private $isDeleted;

  public function __construct($typeId, $content)
  {
    $this->typeId = $typeId;
    $this->content = $content;
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
}

?>
