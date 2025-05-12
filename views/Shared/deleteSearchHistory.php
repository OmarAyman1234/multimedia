<?php 
require_once '../../controllers/DBController.php';
require_once '../../controllers/SearchController.php';
require_once '../../models/searchHistory.php';
session_start();

// deleteSearchHistory.php
require_once '../../controllers/SearchController.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Call your controller method to delete the search history by ID
    $isDeleted = SearchController::deleteSearchHistory($id);

    if($isDeleted) {
        echo 'success'; // Send success response
    } else {
        echo 'error'; // Send error response
    }
}
?>
