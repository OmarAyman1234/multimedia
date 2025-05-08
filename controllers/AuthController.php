<?php
<<<<<<< HEAD
// require_once('./models/client.php');
require_once '../../models/client.php';
// require_once '../models/users.php';
// require_once('../../controllers/DBController.php');
=======
require_once __DIR__ . '/DBController.php';
>>>>>>> 037c63fb0b8779178c3338b0c161cf3b276dbe19

class AuthController
{

    public static function isAdmin() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if($_SESSION['roleId'] == 1)
            return true;

        return false;
    }

    public static function isEditor() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if($_SESSION['roleId'] == 2)
            return true;

        return false;
    }

    public static function isClient() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if($_SESSION['roleId'] == 3)
            return true;

        return false;
    }

    public static function isLoggedIn() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if(isset($_SESSION['username']) && isset($_SESSION['roleId']))
            return true;

        return false;
    }
    

    //login at RegisteredUser Model, register I don't know yet.

    // public function login(Client $user)
    // {
    // $this->db = new DBcontroller();

    // if ($this->db->openConnection()) {
    
    //     $query = "SELECT * FROM registeredusers WHERE username='" . $user->getUsername() . "' AND password='" . $user->getPassword() . "'";

    //     $result = $this->db->select($query);

    //     if ($result === false) {
    //         echo "Error in query.";
    //         return false;
    //     }

    //     if (count($result) == 0) {
    //         if (session_status() === PHP_SESSION_NONE) {
    //             session_start();
    //         }
    //         $_SESSION["errmsg"] = "Wrong username or password.";
    //         return false;
    //     }

    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     $_SESSION["userId"] = $result[0]["id"];
    //     $_SESSION["username"] = $result[0]["username"];
    //     $_SESSION['roleId'] = $result[0]['roleId'];
        
<<<<<<< HEAD
        if (isset($_SESSION["roleId"])) {
            if ($_SESSION["roleId"] == 1) {
                $_SESSION['roleName'] = 'Admin';
            } elseif ($_SESSION["roleId"] == 2) {
              $_SESSION['roleName'] ='Editor';
            } else {
            $_SESSION['roleName']='Client';
            }
        }
        return true;
    } else {
        echo "Error in database connection.";
        return false;
    }
    }
    public static function registerController(users $guest){
        $result = $guest->register($guest);
        if ($result != false){
            if (session_status() === PHP_SESSION_NONE) {
            session_start();
            $_SESSION["userId"] = $result;
            $_SESSION["username"] = $guest->getUsername();
            $_SESSION['roleId'] = 3;
            $_SESSION['roleName']='Client';
            header('location: ../views/client/index.php');
        }
        else{
            header('location: ../Shared/404.php');
        }
        
        return true;
        }
    }

    public static function addList($newList){
        $userId = $newList->getUserId();
        $result = $newList->addList($newList);
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else {
            header("Location: ../views/client/lists.php?id=<?php echo htmlspecialchars($userId); ?>");
            return $result;
        } 

    }


=======
    //     if (isset($_SESSION["roleId"])) {
    //         if ($_SESSION["roleId"] == 1) {
    //             $_SESSION['roleName'] = 'Admin';
    //         } elseif ($_SESSION["roleId"] == 2) {
    //           $_SESSION['roleName'] ='Editor';
    //         } else {
    //         $_SESSION['roleName']='Client';
    //         }
    //     }
    //     return true;
    // } else {
    //     echo "Error in database connection.";
    //     return false;
    // }
    // }
    // public function register(Client $user){
    //     $this->db = new DBController;
    //     $uUsername = $user->getUsername();
    //     $uPassword = $user->getPassword();
    //     $uEmail = $user->getEmail();
    //     if($this->db->openConnection()){
    //         $query = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$uUsername', '$uEmail', '$uPassword', 3)"; 
    //         $result = $this->db->insert($query);
    //         $query1 = "INSERT INTO lists (name, userId) VALUES ('Bookmark', '$result')";
    //         $result1 = $this->db->insert($query1);
    //         if ($result != false){
    //             if (session_status() === PHP_SESSION_NONE) {
    //             session_start();
    //             $_SESSION["userId"] = $result;
    //             $_SESSION["username"] = $uUsername;
    //             $_SESSION['roleId'] = 3;
    //             $_SESSION['roleName']='Client';
    //         }
    //         return true;
    //         }
    //     }
    //     else{
    //         echo "Error in database connection";
    //         return false;
    //     }
    // }
>>>>>>> 037c63fb0b8779178c3338b0c161cf3b276dbe19

}
?>
