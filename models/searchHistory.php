<?php 

require_once '../../controllers/DBController.php';

class SearchHistory {
    private $id;
    private $userId;
    private $searchTerm;
    private $searchTime;

    public function setId($id) {
        $this->id = $id;
    }
    public function setUserId($userId) {
        $this->userId = $userId;
    }
    public function setSearchTerm($searchTerm) {
        $this->searchTerm = $searchTerm;
    }
    public function setSearchTime($SearchTime) {
        $this->searchTime = $SearchTime;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getSearchTerm() {
        return $this->searchTerm;
    }

    public function getSearchTime() {
        return $this->searchTime;
    }
    public function save(SearchHistory $searchHistory) {
        $searchTerm = $searchHistory->getSearchTerm();
        $userId = $searchHistory->getUserId();
        $quary = "INSERT INTO searchhistory (userId, searchTerm) VALUES ($userId, '$searchTerm')";

        $result = DBController::insert($quary);
        if ($result) {
            $searchHistory->setId($result);
            return $searchHistory;
        } else {
            return null;
        }
    }
    public function getSearchHistoryByUserId($userId) {
        $quary = "SELECT * FROM searchhistory WHERE userId = $userId";
        $result = DBController::select($quary);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    public function deleteSearchHistory($id) {
        $quary = "DELETE FROM searchhistory WHERE id = $id";
        $result = DBController::delete($quary);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function getSearchHistoryById($id) {
        $quary = "SELECT * FROM searchhistory WHERE id = $id";
        $result = DBController::select($quary);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    
}



?>