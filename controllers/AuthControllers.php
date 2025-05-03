<?php
    require_once "DBController";
    require_once "../models/registeredUser.php";
    class AuthControllers{
        private $db = new DBController;
        public function register(Client $client){
            $this->db = new DBController;
            
            if($this->db->openConnection()){
                $query = "insert into regesteredUsers (username, email, password, roleID) values ('$client->get')";
            }
        }
    }

