<?php
class User{
    private $id; 
    private $name;
    private $surname;
    private $age;
    private $email;
    private $password;

    function __construct($id,$name,$surname,$age,$email,$password){
        $this->id=$id;
        $this->name=$name;
        $this->surname=$surname;
        $this->age=$age;
        $this->email=$email;
        $this->password=$password;
    }
    
    function getId(){
        return $this->id;
    }   
    function getName(){
        return $this->name;
    }
    function getSurname(){
        return $this->surname;
    }
   
    function getAge(){
        return $this->age;
    }
   
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
}
?>