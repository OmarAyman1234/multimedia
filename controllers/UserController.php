<?php
require_once __DIR__ . '/../controllers/DBController.php';

class UserController {
    public static function getAllRegisteredUsers() {
        $db = new DBController();
        $db->openConnection();

        $query = "
            
            SELECT
                registeredusers.id, 
                registeredusers.username, 
                registeredusers.email, 
                registeredusers.roleId, 
                roles.name AS roleName
            FROM 
                registeredusers
            INNER JOIN 
                roles 
            ON 
                registeredusers.roleId = roles.id
            WHERE 
                registeredusers.isDeleted = 0
        ";

        $result = $db->select($query);

        if ($result === false) {
            throw new Exception("Error fetching users: " . $db->getConnection()->error);
        }

        return $result;
    }

    public static function getRegisteredUser($Id) {
        $db = new DBController();
        $db->openConnection();

        $query = "SELECT id, username, email, roleId FROM registeredusers WHERE id = ? AND isDeleted = 0";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public static function updateRegisteredUser($data) {
        $db = new DBController();
        $db->openConnection();

        $query = "UPDATE registeredusers SET username = ?, email = ?, roleId = ? WHERE id = ?";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param('ssii', $data['username'], $data['email'], $data['roleId'], $data['Id']);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error updating user: " . $stmt->error);
        }
    }

    public static function deleteRegisteredUser($Id) {
        $db = new DBController();
        $db->openConnection();

        $query = "UPDATE registeredusers SET isDeleted = 1 WHERE Id = ?";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param('i', Id);

        return $stmt->execute();
    }

    public static function updateAllRegisteredUsers($roleId, $newRoleId) {
        $db = new DBController();
        $db->openConnection();

        // Update the roleId for all users with the specified roleId
        $query = "
            UPDATE registeredusers
            SET roleId = ?
            WHERE roleId = ?
        ";

        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param('ii', $newRoleId, $roleId);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error updating users: " . $stmt->error);
        }
    }

    public static function updateUserRole($userId, $newRoleId) {
        $db = new DBController();
        $db->openConnection();

        $query = "UPDATE registeredusers SET roleId = ? WHERE id = ?";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param('ii', $newRoleId, $userId);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error updating user role: " . $stmt->error);
        }
    }
}

 if (isset($_GET['action'])) {
    $action = $_GET['action'];

    try {
        switch ($action) {
            case 'getUser':
                $id = $_GET['id'];
                $user = UserController::getUser($id);
                echo json_encode($user);
                break;

            case 'updateUser':
                $data = [
                    'id' => $_POST['id'],
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'role' => $_POST['role']
                ];
                $result = UserController::updateUser($data);
                echo json_encode(['success' => $result]);
                break;

            case 'deleteUser':
                $id = $_GET['id'];
                $result = UserController::deleteUser($id);
                echo json_encode(['success' => $result]);
                break;

            default:
                throw new Exception('Invalid action.');
        }
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}
?>
