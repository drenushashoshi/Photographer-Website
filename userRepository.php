<?php

    include_once"databaseConnection.php";

    class userRepository{
        private $connection;

        function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }
        
        function insertUser($user){
            $conn = $this->connection;

            $name = $user->getName();
            $surname = $user->getSurname();
            $age = $user->getAge();
            $email = $user->getEmail();
            $password = $user->getPassword();
        
            $sql = "INSERT INTO user(name, surname, age, email, password) VALUES (?,?,?,?,?)";
        
            try {
                $statement = $conn->prepare($sql);
                $statement->execute([$name, $surname, $age, $email, $password]);
                echo "<script>alert('Successfully registered!')</script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        

        function getAllUsers(){
            $conn = $this->connection;
        
            $sql = "SELECT * FROM user";
            $statement = $conn->query($sql);
        
            $users = $statement->fetchAll();
            return $users;
        }
        
        public function editUser($id, $name, $surname, $age, $email, $password){
            $conn = $this->connection;
            $sql = "UPDATE user SET name=?, surname=?, age=?, email=?, password=? WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$name, $surname, $age, $email, $password, $id]);
            if ($statement->errorInfo()[0] !== '00000') {
                echo "<script>alert('Error: " . $statement->errorInfo()[2] . "')</script>";
            } else {
                echo "<script>alert('Updated!')</script>";
            }

            

        }

        function deleteUser($id){
            $conn = $this->connection;

            $sql = "DELETE FROM user WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        }
        function getUserById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM user WHERE id='$id'";

            $statement = $conn->query($sql);
            $user=$statement->fetch();

            return $user;
        }


    }

?>