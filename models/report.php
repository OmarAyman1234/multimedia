<?php

class Report {
    private $id;
    private $userId;
    private $articleId;
    private $reportDate;
    private $reportReason;
    private $reportComment;
    private $isDismissed;

    public function __construct($userId, $reportReason, $reportComment)
    {
        $this->userId = $userId;
        $this->reportReason = $reportReason;
        $this->reportComment = $reportComment;
    }

    // ID
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    // User ID
    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }
    
    public function getArticleId() {
        return $this->articleId;
    }
    public function setArticleId($articleId) {
        $this->articleId = $articleId;
    }

    // Report Date
    public function getReportDate() {
        return $this->reportDate;
    }
    public function setReportDate($reportDate) {
        $this->reportDate = $reportDate;
    }

    // Report Reason
    public function getReportReason() {
        return $this->reportReason;
    }
    public function setReportReason($reportReason) {
        $this->reportReason = $reportReason;
    }

    // Report Comment
    public function getReportComment() {
        return $this->reportComment;
    }
    public function setReportComment($reportComment) {
        $this->reportComment = $reportComment;
    }

    public function getIsDismissed() {
        return $this->isDismissed;
    }
    public function setIsDismissed() {
        $this->isDismissed = !$this->isDismissed;
    }

    public static function saveReport(Report $r) {
        $userId = $r->getUserId();
        $articleId = $r->getArticleId();
        $reportReason = $r->getReportReason();
        $reportComment = $r->getReportComment();

        $query = "INSERT INTO reports (userId, articleId, reportReason, reportComment) VALUES ($userId, $articleId, '$reportReason', '$reportComment')";
        $result = DBController::insert($query);
        return $result;
    }

    public static function getReports() {
        $query = "SELECT * FROM reports WHERE isDismissed=0";
        $result = DBController::select($query);
        
        if(empty($result))
            return [];

        return $result;
    }

    public static function dismissReport($reportId) {
        $query = "UPDATE reports SET isDismissed=1 WHERE id=$reportId";
        return DBController::update($query);
    }
}

?>