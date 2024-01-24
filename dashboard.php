<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>
<body>
    
    <h3>REGISTRATIONS:</h3>
    <table border="1">
             <tr>
                 <th>ID</th>
                 <th>NAME</th>
                 <th>SURNAME</th>
                 <th>AGE</th>
                 <th>EMAIL</th>
                 <th>PASSWORD</th>
                 <th>ROLE</th>
                 <th>Edit</th>
                 <th>Delete</th>
                 
             </tr>

             <?php 
             include "DatabaseConnection.php";
             include_once "userRepository.php";

             $userRepository = new UserRepository();

             $users = $userRepository->getAllUsers();

             foreach($users as $User){
                echo 
                "
                <tr>
                     <td>$User[id]</td>
                     <td>$User[name]</td>
                     <td>$User[surname] </td>
                     <td>$User[age] </td>
                     <td>$User[email] </td>
                     <td>$User[password] </td>
                     <td>$User[roli]</td>
                     <td><a href='edit.php?id=$User[id]'>Edit</a> </td>
                     <td><a href='delete.php?id=$User[id]'>Delete</a></td>
                     
                </tr>
                ";
             }

             
             
             ?>
    </table>
</body>
</html>