<?php
 
class DBController {
    private static $dbhost = "localhost";
    private static $dbUser = "root";
    private static $dbPassword = "";
    private static $dbName = "multimedia";
    private static $connection;
    
    public static function openConnection() {
        if(DBController::$connection) {
            return DBController::$connection;
        } 
        else {
            DBController::$connection = new mysqli(DBController::$dbhost, DBController::$dbUser, DBController::$dbPassword, DBController::$dbName);
            
            if (DBController::$connection->connect_error) {
                echo "Error in connection: " . DBController::$connection->connect_error;
                return false;
            }

            return DBController::$connection;
        }
    }

    public static function getConnection() {
        return DBController::$connection;
    }

    public static function closeConnection() {
        if(DBController::$connection) {
            DBController::$connection->close();
        } else {
            echo "Connection is not open.";
        }
    }

    public static function insert($qry){
        DBController::openConnection();
        $result = DBController::$connection->query($qry);
        if (!$result){
            echo "Error : ".mysqli_error(DBController::$connection);
            return false;
        }
        else{
            return DBController::$connection->insert_id;
        }
    }

    public static function select($qry) {
        DBController::openConnection();
        $result = DBController::$connection->query($qry);
        if (!$result) {
            echo "Error in query: " . mysqli_error(DBController::$connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public static function update($qry) {
        DBController::openConnection();
        $result = DBController::$connection->query($qry);
        if(!$result) {
            echo "Error in query: " . mysqli_error(DBController::$connection);
            return false;
        }
        return true;
    }

    public static function delete($qry){
        DBController::openConnection();
        $result = DBController::$connection->query($qry);
        if (!$result){
            echo "Error : " . mysqli_error(DBController::$connection);
            return false;
        }
        else{
            return true;
        }
    }
    
}
?>