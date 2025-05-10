<?php
require_once '../../models/Admin.php';
require_once '../../controllers/AuthController.php';

class UserController {
    public static function getAllUsers() {
        if (!AuthController::isAdmin()) {
            header('Location: ../../views/auth/login.php');
            exit;
        }

        // get all users but the current user
        $users = array_filter(Admin::getAllUsers(), function ($user) {
            return $user['id'] != $_SESSION['userId'];
        });

        return $users;
    }

    public static function deleteUser($userId) {
        if (!AuthController::isAdmin()) {
            header('Location: ../../views/auth/login.php');
            exit;
        }

        if (Admin::deleteUser($userId)) {
            header('Location: ../../views/admin/userManagement.php');
            exit;
        }
    }

    public static function updateUserRole($userId, $newRoleId) {
        if (!AuthController::isAdmin()) {
            header('Location: ../../views/auth/login.php');
            exit;
        }
        
        if (Admin::updateUserRole($userId, $newRoleId)) {
            header('Location: ../../views/admin/userManagement.php');
            exit;
        }
        
    }
}
?>