<?php
$userId=$_GET['id'];
include 'userRepository.php';

$userRepository = new UserRepository();

$user = $strep->getUserById($Id);

?>

<!DOCTYPE html>
<html>
<body>
    <h3>Edit User</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="id"  value="<?=$user['id']?>" readonly> <br> <br>
        <input type="text" name="name" value="<?php echo $user['name']?>"> <br> <br>
        <input type="text" name="surname" value="<?php echo $user['surname']?>"> <br> <br>
        <input type="number" name="age" value="<?php echo $user['age']?>"> <br> <br>
        <input type="text" name="email" value="<?php echo $user['email']?>"> <br> <br>
        <input type="text" name="password" value="<?php echo $user['password']?>"> <br> <br>
        <input type="submit" name="editBtn" value="Save"> <br> <br>
    </form>
</body>
</html>

<?php 

if(isset($_POST['editBtn'])){
    $id = $user['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $userRepository->editUser($id, $name, $surname, $age, $email, $password);
    header("location: users.php");
}

?>
