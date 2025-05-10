<?php
  class ReportReason {
    private $id;
    private $reason;

    public function getId() {
      return $this->id;
    }
    public function setId($id) {
      $this->id = $id;
    }

    public function getReason() {
      return $this->reason;
    }
    public function setReason($r) {
      $this->reason = $r;
    }

    public static function getReportReasons() {
      $query = "SELECT * FROM reportreasons";
      $result = DBController::select($query);
      
      if(empty($result))
        return [];
      
      return $result;
    }
  }
?>