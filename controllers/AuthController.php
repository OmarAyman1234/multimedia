<?php
require_once __DIR__ . '/DBController.php';
require_once '../../models/client.php';
require_once '../../models/registereduser.php';
require_once '../../models/user.php';
require_once '../../views/utils/alert.php';

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
    
    public static function login($username, $password) {
        $userData = RegisteredUser::login($username, $password);

        if (!$userData || count($userData) === 0) {
            // user not found
            Alert::setAlert("danger", "Incorrect credentials");
            header('location: ../../views/auth/login.php');
            exit;
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

            Alert::setAlert('success', "Welcome back, " . $_SESSION['username'] . "!");
            header('location: ../../views/Shared/index.php');
            exit;
        } 
        else {
            Alert::setAlert("danger", "Incorrect credentials");
            header('location: ../../views/auth/login.php');
            exit;
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

                Alert::setAlert('success', "Welcome to Multimedia " . $_SESSION['username'] . "!");

                header('location: ../../views/Shared/index.php');
                exit;
        }
        else if($result === false) {
            Alert::setAlert('danger', 'Username ' . $c->getUsername() . ' is already taken!');
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
