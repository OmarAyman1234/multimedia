<?php
require_once 'RegisteredUser.php';
require_once __DIR__ . '/../controllers/DBController.php'; // Include DBController

class Admin extends RegisteredUser {
    public static function getAllUsers() {
        // Use static method from DBController
        DBController::openConnection();

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

        $result = DBController::select($query);

        if ($result === false) {
            throw new Exception("Error fetching users: " . DBController::getConnection()->error);
        }

        return $result;
    }

    public static function updateUserRole($userId, $newRoleId) {
        // Use static method from DBController
        DBController::openConnection();

        $query = "UPDATE registeredusers SET roleId = ? WHERE id = ?";
        $stmt = DBController::getConnection()->prepare($query);
        $stmt->bind_param('ii', $newRoleId, $userId);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error updating user role: " . $stmt->error);
        }
    }

    public static function deleteUser($userId) {
        // Use static method from DBController
        DBController::openConnection();

        $query = "UPDATE registeredusers SET isDeleted = 1 WHERE id = ?";
        $stmt = DBController::getConnection()->prepare($query);
        $stmt->bind_param('i', $userId);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error deleting user: " . $stmt->error);
        }
    }
}
?>
