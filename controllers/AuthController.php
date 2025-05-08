<?php
require_once __DIR__ . '/DBController.php';
require_once '../../models/client.php';
require_once '../../models/registereduser.php';
require_once '../../models/user.php';

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

    public static function getRoleName($roleId) {
        if($roleId == 1) 
            return 'Admin';
        else if($roleId == 2)
            return 'Editor';
        else
            return 'Client';
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

    public static function login($username, $password) {
        $userData = RegisteredUser::login($username, $password);

        if (!$userData || count($userData) === 0) {
            // user not found
            return false;
        }

        $hashedPassword = $userData[0]['password'];
        if(password_verify($password, $hashedPassword)) {

            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['userId'] = $userData[0]['id'];
            $_SESSION['username'] = $username;
            $_SESSION['roleId'] = $userData[0]['roleId'];
            $_SESSION['roleName'] = AuthController::getRoleName($userData[0]['roleId']);
            header('location: ../../views/Shared/index.php');

            return true;
        } 
        else {
            return false;
        }
    }

    public static function register(Client $c){
        $c->setPassword(password_hash($c->getPassword(), PASSWORD_BCRYPT));

        $result = User::register($c);

        if ($result){
            if (session_status() === PHP_SESSION_NONE)
                session_start();

                $_SESSION["userId"] = $result;
                $_SESSION["username"] = $c->getUsername();
                $_SESSION['roleId'] = 3;
                $_SESSION['roleName']='Client';
                header('location: ../../views/Shared/index.php');
        
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
