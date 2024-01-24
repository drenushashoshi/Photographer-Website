<?php
     class DatabaseConnection{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "web_project";

     function startConnection(){
         try{
             $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
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