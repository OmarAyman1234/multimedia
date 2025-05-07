<?php
require_once __DIR__ . '/../models/Admin.php';

class UserController {
    public static function index() {
        session_start();

        // Ensure only admins can access this page
        if (!isset($_SESSION['roleId']) || $_SESSION['roleId'] != 1) {
            header('Location: ../auth/login.php');
            exit;
        }

        // Fetch all users except the logged-in admin
        $users = array_filter(Admin::getAllUsers(), function ($user) {
            return $user['id'] != $_SESSION['userId'];
        });

        require_once __DIR__ . '/../views/admin/userManagement.php';
    }

    public static function deleteUser() {
        session_start();

        if (!isset($_SESSION['roleId']) || $_SESSION['roleId'] != 1) {
            header('Location: ../auth/login.php');
            exit;
        }

        if (isset($_GET['deleteRegisteredUserId'])) {
            $deleteUserId = $_GET['deleteRegisteredUserId'];
            if ($deleteUserId != $_SESSION['userId']) { // Prevent deleting own account
                Admin::deleteUser($deleteUserId);
            }
            header('Location: UserManagement.php');
            exit;
        }
    }

    public static function updateUserRole() {
        session_start();

        if (!isset($_SESSION['roleId']) || $_SESSION['roleId'] != 1) {
            header('Location: ../auth/login.php');
            exit;
        }

        if (isset($_POST['updateSpecificUserRole'])) {
            $specificUserId = $_POST['specificUserId'];
            $specificNewRoleId = $_POST['specificNewRoleId'];

            try {
                if ($specificUserId != $_SESSION['userId']) { // Prevent editing own role
                    Admin::updateUserRole($specificUserId, $specificNewRoleId);
                }
                header('Location: UserManagement.php');
                exit;
            } catch (Exception $e) {
                echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
            }
        }
    }
}
?>