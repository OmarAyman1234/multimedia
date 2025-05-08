<?php 
require_once '../../controllers/DBController.php';
require_once '../../models/article.php';
require_once '../../controllers/ArticleController.php';


class Category {
  private $id;
  private $name;
  
  public function __construct(array $data = []) {
    if (isset($data['id'])) $this->id = $data['id'];
    if (isset($data['name'])) $this->name = $data['name'];
  }
  
  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function setName($newName) {
    $this->name = $newName;
  }
  public function getName() {
    return $this->name;
  }
  public static function getAllCategory(){
      $quary="select * from categories";
      $result=DBController::select($quary);
      if($result){
        return $result;
      }
      else{
        return false;
      }
  }
  public function getArticlesByCategory(category $category){
    $categoryId=$category->getId();
      $quary="select articles.id,articles.image,articles.title,articles.content,articles.categoryId,categories.name as categoryName from articles join categories on categories.id=articles.categoryId where articles.categoryId=$categoryId";
      $result= DBController::select($quary);
      if($result){
        return $result;
      }
      else{
        return false;
      }
  }
  public static function getCategoryById($categoryId){
    $quary="select * from categories where id=$categoryId";
    $result=DBController::select($quary);
    if($result){
      return $result;
    }
    else{
      return false;
    }
  }

}
?>