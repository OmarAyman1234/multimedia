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
    $articleId = $r->getArticleId();

    if(AuthController::isAdmin()) {
      Alert::setAlert('danger', 'Admins cannot report');
      header("location: ../../views/Shared/article.php?id=" . $articleId);
      exit;
    }
    
    if(AuthController::isLoggedIn()) {
      Report::saveReport($r);

      Alert::setAlert('success', 'The report is sent to the admins and they will review it!');

      header("location: ../../views/Shared/article.php?id=" . $articleId);
      exit;
    }
    else {
      Alert::setAlert("danger", "You have to be logged in to issue a report");
      header('location: ../../views/auth/login.php');
      exit;
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

      Alert::setAlert('dark', "Report #$reportId dismissed");

      header('location: reports.php');
      exit;
    }
    else {
      Alert::setAlert('danger', 'You do not have access to this page');

      header('location: ../../views/auth/login.php');
      exit;
    }
  }
  
}
?>