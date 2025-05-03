<?php 
    class DBController{
        private $dbHost = "localhost";
        private $dbUser = "root";
        private $dbPassword = "";
        private $dbName = "multimedia";
        private $connection;
        public function openConnection(){
            $this->connection =new  mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
            if($this->connection->connect_error){
                echo "Error in connection : ".$this->connection->connect_error;
                return false;
            }
            else{
                return true;
            }
        }
        public function closeConnecction(){
            if($this->connection){
                echo "Connection isn`t opened";
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
    }
?>