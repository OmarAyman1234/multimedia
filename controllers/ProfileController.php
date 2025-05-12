<?php
require_once(__DIR__ . '/DBController.php');
require_once(__DIR__ . '/AuthController.php');
require_once '../../models/registereduser.php';

class ProfileController {
    public static function fetchProfileData($userId) {
        if(AuthController::isLoggedIn()) {
            return RegisteredUser::fetchProfileData($userId);
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }

    public static function updateEmail($newEmail) {
        if(AuthController::isLoggedIn()) {
            RegisteredUser::updateEmail($_SESSION['userId'], $newEmail);

            Alert::setAlert('success', 'Email updated!');

            header("location: ../../views/Shared/profile.php?id=" . $_SESSION['userId']);
            exit;
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
    
    public static function updatePassword($newPass) {
        if(AuthController::isLoggedIn()) {
            $hashedNewPass = password_hash($newPass, PASSWORD_BCRYPT);
            
            RegisteredUser::updatePassword($_SESSION['userId'], $hashedNewPass);

            Alert::setAlert('success', 'Password changed!');

            header("location: ../../views/Shared/profile.php?id=" . $_SESSION['userId']);
            exit;
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
    public static function updateProfilePicture($newProfilePicture) {
        if(AuthController::isLoggedIn()) {
            RegisteredUser::updateProfilePicture($_SESSION['userId'], $newProfilePicture);
            
            $_SESSION['profilePicture'] = $newProfilePicture;

            Alert::setAlert('success', 'Profile picture changed!');

            header("location: ../../views/Shared/profile.php?id=" . $_SESSION['userId']);
            exit;
        }
        else {
            Alert::setAlert('danger', 'Unauthorized!');
            header('location: ../../views/auth/login.php');
            exit;
        }
    }
}
?>