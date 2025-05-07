<?php
require_once 'RegisteredUser.php';
require_once __DIR__ . '/../controllers/DBController.php'; // Corrected path for DBController

class Admin extends RegisteredUser {
    public static function getAllUsers() {
        // Open database connection
        DBController::openConnection();

        // Query to fetch all users with their roles
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

        // Execute the query
        $result = DBController::select($query);

        // Handle errors
        if ($result === false) {
            throw new Exception("Error fetching users: " . DBController::getConnection()->error);
        }

        return $result;
    }

    public static function updateUserRole($userId, $newRoleId) {
        // Open database connection
        DBController::openConnection();

        // Query to update the user's role
        $query = "UPDATE registeredusers SET roleId = ? WHERE id = ?";
        $stmt = DBController::getConnection()->prepare($query);
        $stmt->bind_param('ii', $newRoleId, $userId);

        // Execute the query and handle errors
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error updating user role: " . $stmt->error);
        }
    }

    public static function deleteUser($userId) {
        // Open database connection
        DBController::openConnection();

        // Query to mark the user as deleted
        $query = "UPDATE registeredusers SET isDeleted = 1 WHERE id = ?";
        $stmt = DBController::getConnection()->prepare($query);
        $stmt->bind_param('i', $userId);

        // Execute the query and handle errors
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error deleting user: " . $stmt->error);
        }
    }
}
?>
