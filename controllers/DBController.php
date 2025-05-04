<?php

class DBController {
    public $dbhost = "localhost";
    public $dbUser = "root";
    public $dbName = "multimedia";
    public $dbPassword = "";
    public $connection;

    public function openConnection() {
        $this->connection = new mysqli($this->dbhost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            echo "Error in connection: " . $this->connection->connect_error;
            return false;
        } 
        return true;
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        } else {
            echo "Connection is not open.";
        }
    }

    public function insert($qry){
        $result = $this->connection->query($qry);
        if (!$result){
            echo "Error : ".mysqli_error($this->connection);
        }
        else{
            return $this->connection->insert_id;
        }
    }

    public function select($qry) {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error in query: " . mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    
}
?>