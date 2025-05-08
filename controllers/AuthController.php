<?php
// require_once('./models/client.php');
require_once '../../models/client.php';
require_once '../../models/guest.php';
require_once('../../controllers/DBController.php');

class AuthController
{
    // public $db;

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

    public function login(Client $user)
    {
    $this->db = new DBcontroller();

    if ($this->db->openConnection()) {
    
        $query = "SELECT * FROM registeredusers WHERE username='" . $user->getUsername() . "' AND password='" . $user->getPassword() . "'";

        $result = $this->db->select($query);

        if ($result === false) {
            echo "Error in query.";
            return false;
        }

        if (count($result) == 0) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["errmsg"] = "Wrong username or password.";
            return false;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION["userId"] = $result[0]["id"];
        $_SESSION["username"] = $result[0]["username"];
        $_SESSION['roleId'] = $result[0]['roleId'];
        
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
    public static function registerController(Guest $guest){
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



}
?>
