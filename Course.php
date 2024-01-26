<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    function isSessionTimedOut() {
        $timeout = 3600; 
        $currentTime = time();

        if (isset($_SESSION['loginTime']) && ($currentTime - $_SESSION['loginTime']) > $timeout) {
            error_log("Session timed out. Elapsed time: " . ($currentTime - $_SESSION['loginTime']) . " seconds");
            session_unset();
            session_destroy();
            return true;
        }
        $_SESSION['loginTime'] = $currentTime;

        return false;
    }

  
    if (isSessionTimedOut()) {
        header("Location: CourseLogin.php");
        exit();
    }

    $hide = "hide"; 
    if ($_SESSION['roli'] == "admin") {
        $hide = ""; 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaDoe-Course</title>
    <style>
    body {
        background-color: darkgray;
    }
    .intro{
        font-family: Georgia, 'Times New Roman', Times, serif;
        align-content: center;
        text-align: center;
        font-size: larger;
    }
    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
        margin-left: 10%;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 12px;
    }

    th {
      background-color: burlywood;
    } 
    .logout{
        border-radius: 20px;
        background-color:darkgray;
        outline-style: solid;
        border-color: black;
        width: 150px;
        height: 40px;
        margin-left: 43%;
        font-size: 18px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
  </style>
</head>
<body>
    <header>
        <?php
            include("Header.php");
        ?>
    </header>
    <main>
        
        <div class="intro">
            <h2 style="margin-top:100px">Welcome <?php echo "<br>" . $_SESSION['email'] ?></h2>
            <h4>Here you can find the schedule for the course:</h4>
        </div>
        <table>
            <tr>
                <th>Month</th>
                <th>Date</th>
                <th>Topic</th>
                <th>Time</th>
            </tr>

            <tr>
                <td rowspan="5"><b>February</b></td>
                <td>10.02.2024</td>
                <td>Camera Kits and Recommended Equipment</td>
                <td>9am-11am</td>
            </tr>
            <tr>
                <td>14.02.2024</td>
                <td>Introduction to Camera</td>
                <td>10am-11:30am</td>
            </tr>
            <tr>
                <td>19.02.2024</td>
                <td>Settings</td>
                <td>12pm-1:30pm</td>
            </tr>
            <tr>
                <td>23.02.2024</td>
                <td>Focusing</td>
                <td>9am-11am</td>
            </tr>
            <tr>
                <td>28.02.2024</td>
                <td>Getting Pictures Pin Sharp</td>
                <td>12pm-1:30pm</td>
            </tr>

            <tr>
            <td rowspan="5"><b>March</b></td>
                <td>10.03.2024</td>
                <td>Composition</td>
                <td>9am-11am</td>
            </tr>
            <tr>
                <td>14.03.2024</td>
                <td>Lenses</td>
                <td>10am-11:30am</td>
            </tr>
            <tr>
                <td>19.03.2024</td>
                <td>Focal Lengths</td>
                <td>12pm-1:30pm</td>
            </tr>
            <tr>
                <td>23.03.2024</td>
                <td>Crop and Full Frame Sensors</td>
                <td>9am-11am</td>
            </tr>
            <tr>
                <td>28.03.2024</td>
                <td>Metering</td>
                <td>12pm-1:30pm</td>
            </tr>

            <tr>
                <td rowspan="5"><b>April</b></td>
                <td>10.04.2024</td>
                <td>ISO</td>
            <td>9am-11am</td>
            </tr>
            <tr>
                <td>14.04.2024</td>
                <td>Apertures and Depth of Field</td>
                <td>10am-11:30am</td>
            </tr>
            <tr>
                <td>19.04.2024</td>
                <td>Shutter Speeds</td>
                <td>12pm-1:30pm</td>
            </tr>
            <tr>
                <td>23.04.2024</td>
                <td>Controlling Movement and Slow Sync Flash</td>
                <td>9am-11am</td>
            </tr>
            <tr>
                <td>28.04.2024</td>
                <td>Balancing Exposures</td>
                <td>12pm-1:30pm</td>
            </tr>

            <tr>
                <td rowspan="4"><b>May</b></td>
                <td>10.05.2024</td>
                <td>Resolution</td>
                <td>9am-11am</td>
            </tr>
            <tr>
                <td>14.05.2024</td>
                <td>Understanding Light and White Balance</td>
                <td>10am-11:30am</td>
            </tr>
            <tr>
                <td>19.05.2024</td>
                <td>Night Photography</td>
                <td>6pm-7:30pm</td>
            </tr>
            <tr>
                <td>23.05.2024</td>
                <td>Painting with Light</td>
                <td>9am-11am</td>
            </tr>

        </table><br><br>
        <button class="logout"><a href="logout.php">Logout</a></button>
    </main>
    

</body>
</html>