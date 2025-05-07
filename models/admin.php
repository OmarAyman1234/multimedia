<?php
require_once 'RegisteredUser.php';
require_once __DIR__ . '/../controllers/DBController.php'; // Include DBController

class Admin extends RegisteredUser {
    public static function getAllUsers() {
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

    public static function deleteUser($userId) {
        $db = new DBController();
        $db->openConnection();

        $query = "UPDATE registeredusers SET isDeleted = 1 WHERE id = ?";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param('i', $userId);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error deleting user: " . $stmt->error);
        }
    }
}
?>
