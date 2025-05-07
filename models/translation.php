<?php
class Translation implements JsonSerializable {
    private $id;
    private $languageId;
    private $languageName;
    private $articleId;
    private $translatedTitle;
    private $translatedContent;

    // Constructor to initialize properties
    public function __construct(array $data = [])
    {
        if (isset($data['id'])) $this->id = $data['id'];
        if (isset($data['languageId'])) $this->languageId = $data['languageId'];
        if (isset($data['languageName'])) $this->languageName = $data['languageName'];
        if (isset($data['articleId'])) $this->articleId = $data['articleId'];
        if (isset($data['translatedTitle'])) $this->translatedTitle = $data['translatedTitle'];
        if (isset($data['translatedContent'])) $this->translatedContent = $data['translatedContent'];
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getLanguageId()
    {
        return $this->languageId;
    }

    public function getLanguageName()
    {
        return $this->languageName;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function getTranslatedTitle()
    {
        return $this->translatedTitle;
    }

    public function getTranslatedContent()
    {
        return $this->translatedContent;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
    }

    public function setLanguageName($languageName)
    {
        $this->languageName = $languageName;
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }

    public function setTranslatedTitle($translatedTitle)
    {
        $this->translatedTitle = $translatedTitle;
    }

    public function setTranslatedContent($translatedContent)
    {
        $this->translatedContent = $translatedContent;
    }

    // This interface implementation to encode json for private attributes in the class.
    public function jsonSerialize():mixed {
      return [
          'id' => $this->id,
          'languageId' => $this->languageId,
          'languageName' => $this->languageName,
          'articleId' => $this->articleId,
          'translatedTitle' => $this->translatedTitle,
          'translatedContent' => $this->translatedContent,
      ];
    }
  
  

    public static function getArticleTranslations($articleId) {
      $query = "SELECT t.*, l.name as languageName FROM translations as t JOIN languages as l ON t.languageId = l.id WHERE articleId=$articleId";
      $result = DBController::select($query);
  
      if(empty($result)) {
        return [];
      }

      $translations = [];
      foreach ($result as $row) {
        $transl = new Translation($row);
        $translations[] = $transl;
      }
      return $translations;
    }
}
?>
