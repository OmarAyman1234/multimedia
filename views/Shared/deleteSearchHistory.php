<?php 
require_once '../../controllers/DBController.php';
require_once '../../controllers/SearchController.php';
require_once '../../models/searchHistory.php';
session_start();

$_GET['id'] = $_GET['id'] ?? null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = SearchController::deleteSearchHistory($id);
    if ($result) {
        echo "<script>alert('Search history deleted successfully.');</script>";
        header("Location: searchHistory.php");
        exit();
    } else {
        echo "<script>alert('Failed to delete search history.');</script>";
    }
} else {
    echo "<script>alert('No search history ID provided.');</script>";
}


?>