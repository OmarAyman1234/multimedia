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
}
?>