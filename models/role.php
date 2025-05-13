<?php 
  class Role {
    private $id;
    private $name;

    public function getId() {
      return $this->id;
    }
    public function setId($id) {
      $this->id = $id;
    }

    public function getName() {
      return $this->name;
    }
    public function setName($name) {
      $this->name = $name;
    }

    public static function getRoleName($roleId) {
        if($roleId == 1) 
            return 'Admin';
        else if($roleId == 2)
            return 'Editor';
        else
            return 'Client';      
    }
  }
?>