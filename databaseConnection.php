<?php
     class DatabaseConnection{
        private $host = "localhost";
        private $username = "postgres"; // default PostgreSQL username
        private $password = "postgres"; // set your PostgreSQL password
        private $database = "web_project";
        private $port = "5432"; // default PostgreSQL port

     function startConnection(){
         try{
             $conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->database", $this->username, $this->password);
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
             if(!$conn){
                 return null;
             }else{
                 return $conn;
             }
         }catch(PDOException $e){
            echo "Connection failed ". $e->getMessage();
             return null;
         }
     }
 }
?>