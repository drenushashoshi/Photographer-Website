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

            $conn->beginTransaction();

            try {
                $sql = "UPDATE user SET name=?, surname=?, age=?, email=?, password=? WHERE id=?";
                $statement = $conn->prepare($sql);
                $statement->execute([$name, $surname, $age, $email, $password, $id]);

                $conn->commit();

                echo "<script>alert('Updated!')</script>";
            } catch (PDOException $e) {
                $conn->rollBack();
                echo "Error: " . $e->getMessage();
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

            $sql = "SELECT * FROM user WHERE id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            $user=$statement->fetch();

            return $user;
        }


    }

?>