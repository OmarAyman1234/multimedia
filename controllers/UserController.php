<?php
require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/AuthController.php';

class UserController {
    public static function index() {
        // Ensure only admins can access this page
        if (!AuthController::isAdmin()) {
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
        // Ensure only admins can delete users
        if (!AuthController::isAdmin()) {
            header('Location: ../auth/login.php');
            exit;
        }

        if (isset($_GET['deleteRegisteredUserId'])) {
            $deleteUserId = $_GET['deleteRegisteredUserId'];
            if ($deleteUserId != $_SESSION['userId']) { // Prevent deleting own account
                Admin::deleteUser($deleteUserId);
            }
            header('Location: ../views/admin/userManagement.php');
            exit;
        }
    }

    public static function updateUserRole() {
        // Ensure only admins can update roles
        if (!AuthController::isAdmin()) {
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
                header('Location: ../views/admin/userManagement.php');
                exit;
            } catch (Exception $e) {
                echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
            }
        }
    }
}

// Routing logic
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'index':
            UserController::index();
            break;
        case 'deleteUser':
            UserController::deleteUser();
            break;
        case 'updateUserRole':
            UserController::updateUserRole();
            break;
        default:
            echo "Invalid action.";
            break;
    }
}
?>