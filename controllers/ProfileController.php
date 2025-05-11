<?php
require_once(__DIR__ . '/DBController.php');
require_once(__DIR__ . '/AuthController.php');
require_once '../../models/registereduser.php';

class ProfileController {
    public static function fetchProfileData($userId) {
        if(AuthController::isLoggedIn()) {
            $result = RegisteredUser::fetchProfileData($userId);
            return $result;
        }
        else {
            // session started when checking if the user is logged in or not
            $_SESSION['errMsg'] = 'Unauthorized!';
        }
    }

    public static function updateEmail($newEmail) {
        if(AuthController::isLoggedIn()) {
            // session started when checking if the user is logged in or not
            RegisteredUser::updateEmail($_SESSION['userId'], $newEmail);
            return true;
        }
        else {
            // session started when checking if the user is logged in or not
            $_SESSION['errMsg'] = 'Unauthorized!';
            return false;
        }
    }
    
    public static function updatePassword($newPass) {
        if(AuthController::isLoggedIn()) {
            $hashedNewPass = password_hash($newPass, PASSWORD_BCRYPT);
            
            // session started when checking if the user is logged in or not
            RegisteredUser::updatePassword($_SESSION['userId'], $hashedNewPass);
            return true;
        }
        else {
            // session started when checking if the user is logged in or not
            $_SESSION['errMsg'] = 'Unauthorized!';
            return false;
        }
    }
    public static function updateProfilePicture($newProfilePicture) {
        if(AuthController::isLoggedIn()) {
            // session started when checking if the user is logged in or not
            RegisteredUser::updateProfilePicture($_SESSION['userId'], $newProfilePicture);
            return true;
        }
        else {
            // session started when checking if the user is logged in or not
            $_SESSION['errMsg'] = 'Unauthorized!';
            return false;
        }
    }
}
//$db= new DBController;
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