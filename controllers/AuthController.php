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
    public function register(Client $user){
        $this->db = new DBController;
        $uUsername = $user->getUsername();
        $uPassword = $user->getPassword();
        $uEmail = $user->getEmail();
        if($this->db->openConnection()){
            $query = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$uUsername', '$uEmail', '$uPassword', 3)"; 
            $result = $this->db->insert($query);
            $query1 = "INSERT INTO lists (name, userId) VALUES ('Bookmark', '$result')";
            $result1 = $this->db->insert($query1);
            if ($result != false){
                if (session_status() === PHP_SESSION_NONE) {
                session_start();
                $_SESSION["userId"] = $result;
                $_SESSION["username"] = $uUsername;
                $_SESSION['roleId'] = 3;
                $_SESSION['roleName']='Client';
            }
            return true;
            }
        }
        else{
            echo "Error in database connection";
            return false;
        }
    }
    public static function editlist($listId, $newName){
        $db = new DBController;
        $db->openConnection();
        $query = "UPDATE `lists` SET `name`='$newName' WHERE id = '" . $listId . "'";
        $result = $db->delete($query);
        if($result === false) {
            echo 'Error in query';
            return false;
        } 
        else {
            return $result;
        } 

    }
    public static function fetchArticles($listId){
        $db = new DBController;
        $db->openConnection(); 
        $query = "SELECT a.id AS article_id, a.title, a.content, a.image 
          FROM articles a 
          JOIN lists_articles la ON a.id = la.articleId 
          WHERE la.listId = " . $listId; // Direct embedding - DANGEROUS!
        $result = $db->select($query);
        if($result === false) {
            echo 'Error in query';
            return;
        } 
        else if(count($result) === 0) {
            header('location: 404.php');
        }
        else {
            return $result;
        } 
    }

}
?>
