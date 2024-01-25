<?php

$userId= $_GET['id'];
include_once 'userRepository.php';



$userRepository = new userRepository();
$userRepository->deleteUser($userId);

header("location: dashboard.php");
?>
