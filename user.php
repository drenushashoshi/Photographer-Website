<?php
class User{
    private $id; 
    private $name;
    private $surname;
    private $age;
    private $email;
    private $password;

    function __construct($name,$surname,$age,$email,$password){
        $this->name=$name;
        $this->surname=$surname;
        $this->age=$age;
        $this->email=$email;
        $this->password=$password;
    }
    
    function getName(){
        return $this->name;
    }
    function setName($name){
        $this->Emri = $name;
    }
    function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        $this->Emri = $surname;
    }
   
    function getAge(){
        return $this->age;
    }
    public function setAge($age){  
        $this->age=$age;
    }
   
    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function getPassword(){
        return $this->password;
    }
    function setPassword($password){
        $this->password=$password;
    }
}
?>