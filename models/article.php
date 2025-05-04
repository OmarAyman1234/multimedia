<?php

class Article {
  private $id;
  private $title;
  private $image;
  private $content;
  private $categoryId;
  private $editorId;
  private $isEdited;
  private $publishDate;
  
  // public function __construct($title, $image, $content, $categoryId, $editorId)
  // {
  //   $this->title = $title;
  //   $this->image = $image;
  //   $this->content = $content;
  //   $this->categoryId = $categoryId;
  //   $this->editorId = $editorId;
  // }

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

  public function getEditorId() {
    return $this->editorId;
  }
  public function setEditorId($id) {
    $this->editorId = $id;
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
}

?>