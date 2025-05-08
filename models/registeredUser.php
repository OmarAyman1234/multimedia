<?php 

abstract class RegisteredUser {
  private $id;
  private $username;
  private $email;
  private $password;
  private $isDeleted;
  private $joinDate;
  private $roleId;


  public function getId() {
    return $this->id;
  }

  public function getUsername() {
    return $this->username;

  }
  public function setUsername($newUsername) {
    $this->username= $newUsername;
  }

  public function getEmail() {
    return $this->email;
  }
  public function setEmail($newEmail) {
    $this->email = $newEmail;
  }

  // Should be hashed!
  public function setPassword($newPassword) {
    $this->password = $newPassword;
  }
  public function getPassword() {
    return $this->password;
  }

  public function setIsDeleted() {
    $this->isDeleted = !$this->isDeleted;
  }

  public function getJoinDate() {
    return $this->joinDate;
  }

  public function getRoleId() {
    return $this->roleId;
  }

  public function setRoleId($newRoleId) {
    $this->roleId = $newRoleId;
  }

  public static function login($username, $password) {
    $query = "SELECT * FROM registeredusers WHERE username='$username' and isDeleted=0";
    $result = DBController::select($query);

    if($result) {
      return $result;
    }
    else {
      return false;
    }
  }

  public static function fetchProfileData($userId) {
    $query = "SELECT u.*, r.name as roleName FROM registeredusers as u JOIN roles as r ON r.id = u.roleId WHERE u.id = $userId";
    $result = DBController::select($query);

    return $result;
  }

  public static function updateEmail($userId, $newEmail) {
    $query = "UPDATE registeredusers SET email='$newEmail' WHERE id=" . $userId;
    $result = DBController::update($query);

    return $result;
  }

  public static function updatePassword($userId, $newPass) {
    $query = "UPDATE registeredusers SET password='$newPass' WHERE id=" . $userId;
    $result = DBController::update($query);

    return $result;
  }
  
}

// $db= new DBController;
//     public static function changePassword($newPass,$userId) {
//         $db = new DBController();
//         if($db->openConnection()) {
//             $user = $db->getConnection()->prepare("UPDATE registeredusers SET password = ? WHERE id = ?");
//             $user->bind_param("si", $newPass, $userId);
//             $user->execute();
//         }
//  }
 

//     public static function changeEmail($newEmail,$userId) {
//         $db = new DBController();
//         if($db->openConnection()) {
//             $user = $db->getConnection()->prepare("UPDATE registeredusers SET email = ? WHERE id = ?");
//             $user->bind_param("si", $newEmail, $userId);
//             $user->execute();
//         }
//     }
//   }
//  $db = new DBController();

//  if ($db->openConnection()) {
//     $userId = $_SESSION['userId'];

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         if (isset($_POST['field']) && isset($_POST['value'])) {
//             $field = $_POST['field'];
//             $newValue = htmlspecialchars($_POST['value']);
        

          
//             $allowedFields = ['email', 'password','joinDate'];
//             if (in_array($field, $allowedFields)) {

//                 if ($field === 'password') {
//                     $newValue = password_hash($newValue, PASSWORD_DEFAULT);
//                 }

          
//                 $user = $dbcontroller->connection->prepare("UPDATE registeredusers SET $field = ? WHERE id = ?");
//                 $user->bind_param("si", $newValue, $userId);
//                 $user->execute();
//             }
//         }
//     }

   

//     if ($_SESSION["roleId"] == 1) {
//         $_SESSION['roleName'] = 'Admin';
//     } elseif ($_SESSION["roleId"] == 2) {
//         $_SESSION['roleName'] = 'Editor';
//     } else {
//         $_SESSION['roleName'] = 'Client';
//     }

//     if ($result && count($result) > 0) {
//         $user = $result[0];



//     }
// }
?>