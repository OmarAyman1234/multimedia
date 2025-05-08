<?php

require_once('../../controllers/AuthController.php');
require_once('../../controllers/DBController.php');
require_once('../../controllers/profileController.php');

$userId = $_SESSION['userId'];
$user= ProfileController::fetchProfileData($userId);




 ?>
    
    <!DOCTYPE html>
    <html lang="ar">
        
        <head>
            <meta charset="UTF-8">
            <title>profile </title>
            <?php require_once('../../views/utils/linkTags.php');?>
            <style>
                .profile-table {
                    width: 60%;
                    margin: 40px auto;
                    border-collapse: collapse;
                    font-family: Arial, sans-serif;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                
                .profile-table th,
                .profile-table td {
                    padding: 12px 20px;
                    border: 1px solid #ddd;
                    text-align: right;
                }
                
                .profile-table th {
                    background-color: #f5f5f5;
                }
                
                input[type='email'],
                input[type='password'] {
                    width: 90%;
                    padding: 8px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    direction: ltr;
                }
                
                .save-btn {
                    padding: 8px 16px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background 0.3s;
                }
                
                .save-btn:hover {
                    background-color: #0056b3;
                }
                
                .error-message {
                    color: red;
                    text-align: center;
                }
                
                h2 {
                    text-align: center;
                    color: #333;
                }
                </style>
    </head>
    
    <body>
        <?php
        require_once('../../views/utils/nav.php');
        require_once('../../views/utils/sidebar.php');
        ?>
        
        <h2>Hello <?= htmlspecialchars($user['username']) ?></h2>
        
        <table class="profile-table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Current value</th>
                    <th>New value</th>
                    <th>Button</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>username</td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                
                
                <tr>
                    <td>email</td>
                    <td><?= htmlspecialchars($user['email']) ?>
                </td>
                <td colspan="2">
                    <form method="POST" style="margin:0;">
                        <input type="hidden" name="field" value="email">
                        <input type="email" name="value" placeholder="New email" required>
                        <button class="save-btn" type="submit">Save</button>
                    </form>
                </td>
            </tr>
            
            
            <tr>
                <td>password</td>
                <td>********</td>
                <td colspan="2">
                    <form method="POST" style="margin:0;">
                        <input type="hidden" name="field" value="password">
                        <input type="password" name="value" placeholder="New password" required>
                        <button class="save-btn" type="submit">Save</button>
                    </form>
                </td>
            </tr>
            
            
            <tr>
                <td>Role id</td>
                <td colspan="3"><?= htmlspecialchars($_SESSION['roleName']) ?></td>
            </tr>
            
            
            <tr>
                <td>joinDate</td>
                <td colspan="3"><?= htmlspecialchars($user['joinDate']) ?></td>
            </tr>
        </tbody>
    </table>
    
    <?php require_once('../../views/utils/footer.php'); ?>
    
    <?php require_once('../../views/utils/scripts.php'); ?>
   
</body>

</html>