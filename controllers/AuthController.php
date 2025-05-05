<?php
// require_once('./models/client.php');
require_once '../../models/client.php';
require_once('../../controllers/DBController.php');

class AuthController
{
    public $db;

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
}
?>
