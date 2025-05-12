<?php
require_once '../../models/report.php';
require_once '../../models/reportreasons.php';
require_once '../../controllers/AuthController.php';
require_once '../../views/utils/alert.php';

class ReportController {
  public static function getReportReasons() {
    return ReportReason::getReportReasons();
  }
  
  public static function sendReportToAdmin(Report $r) {
    if(AuthController::isLoggedIn() && !AuthController::isAdmin()) {
      Report::saveReport($r);
      Alert::setAlert('success', 'Report sent to admins and they will review it!');
    }
    else {
      Alert::setAlert('danger', 'Admins cannot report or you have to log in');
    }
  }

  public static function getReports() {
    if(AuthController::isAdmin()) {
      return Report::getReports();
    }
    else {
      Alert::setAlert('danger', 'You do not have access to this page');
      
      header('location: ../../views/auth/login.php');
      exit;
    }
  }

  public static function dismissReport($reportId) {
    if(AuthController::isAdmin()) {
      Report::dismissReport($reportId);
      Alert::setAlert('danger', "Report #$reportId dismissed");
    }
    else {
      Alert::setAlert('danger', 'You do not have access to this page');
      header('location: ../../views/auth/login.php');
      exit;
    }
  }
  
}
?>