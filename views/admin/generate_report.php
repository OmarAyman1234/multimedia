<?php
// set default timezone to Cairo's.
date_default_timezone_set('Africa/Cairo');

require_once '../../controllers/UserController.php';
require_once '../../controllers/AuthController.php';
require_once '../../controllers/ArticleController.php';

if(!AuthController::isAdmin()) {
  header('location: ../../views/auth/login.php');
  exit;
}

  // Include the FPDF library
  require_once __DIR__ . '/../../vendor/autoload.php';
  // Function to get the number of users from the database
  function getUserCount() {
    return (count(UserController::getAllUsers()));
  }

  // Function to get the number of articles from the database
  function getArticleCount() {
      return (count(ArticleController::getAllArticles()));
  }

  // Create a new PDF document
  $pdf = new FPDF();
  $pdf->AddPage();

  // Set font
  $pdf->SetFont('Arial', 'B', 16);

  // Title
  $pdf->Cell(0, 10, 'Multimedia Statistics Report', 1, 1, 'C');
  $pdf->Ln(10);

  // Set font for the report content
  $pdf->SetFont('Arial', '', 12);

  // Get current counts
  $userCount = getUserCount();
  $articleCount = getArticleCount();

  // Add system statistics
  $pdf->Cell(0, 10, '1- The system has ' . $userCount . ' users', 0, 1);
  $pdf->Cell(0, 10, '2- The system has ' . $articleCount . ' articles', 0, 1);

  // Add date and time of report generation
  $pdf->Ln(10);
  $pdf->Cell(0, 10, 'Report generated on: ' . date('Y-m-d H:i:s'), 0, 1);

  // Output the PDF
  $pdf->Output('I', 'multimedia_statistics_report.pdf');
?>