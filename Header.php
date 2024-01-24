<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaDoePhoto</title>
    <style>
    header {
    display: flex;
    position: fixed;
    align-items: center;
    top: 0;
    left: 0;
    width: 100%;
    height: 66px;
    background-color: white;
    z-index: 1000;
    overflow: hidden;
    opacity: 0.5;
    }
    header img{
        width: 15%;
        height: 60px;
        margin: 0px;
        padding: 0px;
        align-self: center;
    }

    .pages ul {
        display: flex;
        justify-content: space-between; 
        align-items: center;
        list-style: none;
        padding: 0;
        width: 85%;
    }

    .pages ul li {
        margin-left: 150px;
        color: black;
        text-align: center;
        font-family: sans-serif;
        align-items: center;
    }
    .pages ul li a{
        text-decoration: none;
        color: black;
        opacity: 1;
    }
    .hide {
    display: none;
    }  
    </style>
</head>
<body>
<header>
        <img src="Logo.png" alt="Logo">
        <div class="pages">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="Portofolio.php">Portofolio</a></li>
                <li><a href="CourseLogin.php">Course Login</a></li>
                <li> <a href="Booking.php">Booking</a></li>
                <li><a href="dashboard.php" class="<?php echo $hide?>">Dashboard</a></li>
            </ul>
        </div>
    </header>
</body>
</html>