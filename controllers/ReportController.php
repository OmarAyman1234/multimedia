<?php
require_once '../../models/report.php';
require_once '../../models/reportreasons.php';
require_once '../../controllers/AuthController.php';

class ReportController {
  public static function getReportReasons() {
    return ReportReason::getReportReasons();
  }
  
  public static function sendReportToAdmin(Report $r) {
    if(AuthController::isLoggedIn()) {
      Report::saveReport($r);
    }
  }

  public static function getReports() {
    if(AuthController::isAdmin()) {
      return Report::getReports();
    }
    else {
      header('location: ../../views/auth/login.php');
      exit;
    }
  }

  public static function dismissReport($reportId) {
    if(AuthController::isAdmin()) {
      Report::dismissReport($reportId);
    }
    else {
      header('location: ../../views/auth/login.php');
      exit;
    }
  }
  
}
?>