<?php
require_once('../../views/utils/nav.php');
require_once ('../utils/linkTags.php');
require_once('../../controllers/DBController.php');
require_once('../../controllers/AuthController.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$dbController = new DBController();

if ($dbController->openConnection()) {
    $userId = $_SESSION['roleId'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['field']) && isset($_POST['value'])) {
            $field = $_POST['field'];
            $newValue = htmlspecialchars($_POST['value']);

          
            $allowedFields = ['email', 'password','joinDate'];
            if (in_array($field, $allowedFields)) {

                if ($field === 'password') {
                    $newValue = password_hash($newValue, PASSWORD_DEFAULT);
                }

          
                $user = $dbController->connection->prepare("UPDATE registeredusers SET $field = ? WHERE id = ?");
                $user->bind_param("si", $newValue, $userId);
                $user->execute();
            }
        }
    }

   
    $query = "SELECT * FROM registeredusers WHERE id = $userId";
    $result = $dbController->select($query);

    if ($_SESSION["roleId"] == 1) {
        $_SESSION['roleName'] = 'Admin';
    } elseif ($_SESSION["roleId"] == 2) {
        $_SESSION['roleName'] = 'Editor';
    } else {
        $_SESSION['roleName'] = 'Client';
    }

    if ($result && count($result) > 0) {
        $user = $result[0];

        echo "
        <style>
            .profile-table {
                width: 60%;
                margin: 40px auto;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .profile-table th, .profile-table td {
                padding: 12px 20px;
                border: 1px solid #ddd;
                text-align: left;
            }
            .profile-table th {
                background-color: rgb(179, 161, 161);
            }
            input[type='text'], input[type='email'], input[type='password'] {
                width: 90%;
                padding: 6px;
            }
            .save-btn {
                padding: 6px 12px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .save-btn:hover {
                background-color: #0056b3;
            }
        </style>

        <h2 style='text-align: center;'>Welcome, " . htmlspecialchars($user['username']) . "</h2>
        <table class='profile-table'>
            <tr>
                <th>Field</th>
                <th>Current Value</th>
                <th>New Value</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>Username</td>
                <td>" . htmlspecialchars($user['username']) . "</td>
                <td>-</td>
                <td>-</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>" . htmlspecialchars($user['email']) . "</td>
                <form method='POST'>
                    <td><input type='email' name='value' placeholder='New email' required></td>
                    <td>
                        <input type='hidden' name='field' value='email'>
                        <button class='save-btn' type='submit'>Save</button>
                    </td>
                </form>
            </tr>

            <tr>
                <td>Password</td>
                <td>********</td>
                <form method='POST'>
                    <td><input type='password' name='value' placeholder='New password' required></td>
                    <td>
                        <input type='hidden' name='field' value='password'>
                        <button class='save-btn' type='submit'>Save</button>
                    </td>
                </form>
            </tr>

            <tr>
                <td>Role</td>
                <td colspan='3'>" . htmlspecialchars($_SESSION['roleName']) . "</td>
            </tr>
           <tr>
    <td>Join Date</td>
    <td colspan='3'>" . htmlspecialchars($user['joinDate']) . "</td>
</tr>

        </table>
        ";
    } else {
        echo "User not found.";
    }

    $dbController->closeConnection();
} else {
    echo "Failed to connect to the database.";
}
require_once ('../utils/footer.php');
?>
