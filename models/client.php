<?php
  require_once 'registeredUser.php';

  class Client extends RegisteredUser {


}

require_once(__DIR__ . '/DBController.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
 
$userId = $_SESSION['userId'];

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

class ProfileController {
    public $db;
    public static function fetchProfileData($userId) {
        $db = new DBController();
        if($db->openConnection()) {
            $query = "SELECT * FROM registeredusers WHERE id = $userId";
            $result = $db->select($query);

            if($result === false) {
                echo 'Error in query';
                return;
            } 
            else if(count($result) === 0) {
                header('location: ../../views/404.php');
                exit;
            }
            else {
                return $result;
            }
        }
    }
//$db= new DBController;
    public static function changePassword($newPass,$userId) {
        $db = new DBController();
        if($db->openConnection()) {
            $user = $db->getConnection()->prepare("UPDATE registeredusers SET password = ? WHERE id = ?");
            $user->bind_param("si", $newPass, $userId);
            $user->execute();
        }
 }
 

    public static function changeEmail($newEmail,$userId) {
        $db = new DBController();
        if($db->openConnection()) {
            $user = $db->getConnection()->prepare("UPDATE registeredusers SET email = ? WHERE id = ?");
            $user->bind_param("si", $newEmail, $userId);
            $user->execute();
        }
    }
  }
 $db = new DBController();

 if ($db->openConnection()) {
    $userId = $_SESSION['userId'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['field']) && isset($_POST['value'])) {
            $field = $_POST['field'];
            $newValue = htmlspecialchars($_POST['value']);
        

          
            $allowedFields = ['email', 'password','joinDate'];
            if (in_array($field, $allowedFields)) {

                if ($field === 'password') {
                    $newValue = password_hash($newValue, PASSWORD_DEFAULT);
                }

          
                $user = $dbcontroller->connection->prepare("UPDATE registeredusers SET $field = ? WHERE id = ?");
                $user->bind_param("si", $newValue, $userId);
                $user->execute();
            }
        }
    }

   

    if ($_SESSION["roleId"] == 1) {
        $_SESSION['roleName'] = 'Admin';
    } elseif ($_SESSION["roleId"] == 2) {
        $_SESSION['roleName'] = 'Editor';
    } else {
        $_SESSION['roleName'] = 'Client';
    }

    if ($result && count($result) > 0) {
        $user = $result[0];



    }
}


?>
?>