<?php

include 'userRepository.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;


if ($id !== null) {
    $strep = new UserRepository();

    $User = $strep->getUserById($id);

    if ($User !== false) {
        ?>
        <!DOCTYPE html>
        <html>
        <body>
            <h3>Edit User</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>" method="post">
                <input type="text" name="name" value="<?php echo $User['name']?>"> <br> <br>
                <input type="text" name="surname" value="<?php echo $User['surname']?>"> <br> <br>
                <input type="number" name="age" value="<?php echo $User['age']?>"> <br> <br>
                <input type="text" name="email" value="<?php echo $User['email']?>"> <br> <br>
                <input type="text" name="password" value="<?php echo $User['password']?>"> <br> <br>
                <input type="submit" name="editBtn" value="Save"> <br> <br>
            </form>
        </body>
        </html>

        <?php 

        if(isset($_POST['editBtn'])){
            $User = $strep->getUserById($id);

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $password = $_POST['password'];

    
            $strep->editUser($id, $name, $surname, $age, $email, $password);

            header("location: dashboard.php");
        }
    } else {
        echo "User not found with ID: $id";
    }
} else {
    echo "No ID specified in the URL.";
}
?>
