<?php
require_once 'databaseConnection.php'; 
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

    
    if(isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
        echo '<script>alert("Successfully registered! Login down below.");</script>';
        unset($_SESSION['registration_success']);
    }

    $hide = "hide"; 

    if (isset($_SESSION['roli']) && $_SESSION['roli'] == "admin") {
        $hide = ""; 
    }

if (isset($_POST['loginbtn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script>alert("Please fill the required fields!");</script>';
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $dbConnection = new DatabaseConnection();
        $conn = $dbConnection->startConnection();

        if ($conn) {
            try {
                $query = "SELECT id, email, roli FROM user WHERE email = :email AND password = :password";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['roli'] = $user['roli'];
                    $_SESSION['admin'] = ($user['roli'] === 'admin');
                    $_SESSION['loginTime'] = time(); 

                    header("location: Course.php");
                    exit();
                } else {
                    echo '<script>alert("Invalid email or password!");</script>';
                }
            } catch (PDOException $e) {
                echo '<script>alert("Query failed");</script>' . $e->getMessage();
            }
            $dbConnection = null;
        } else {
            echo '<script>alert("Database connection failed");</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElaDoe-CourseLogin</title>
    <link rel="stylesheet" href="CourseLogin.css">
    <meta charset="UTF-8">
</head>
<body>
    <header>
    <?php
       include('Header.php');
    ?>
    </header>
   
    <div class="login-form">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1>Hello! You can login to the course here:</h1>
            <div class="content">
                <div class="input-field">
                    <input type="text" id="email" name="email" placeholder="Email" autocomplete="email">
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password">
                </div>
            </div>
            <div class="action">
                <a class="f1" href="CourseLogin-Register.php">Register</a>
            
                <button  name="loginbtn" class="f">Login</button><br>
            </div><br>
            
        </form>
    </div>



    <div class="Teksti">
        <div class="spacer"></div>
        <div class="Info">     
                <hr style="width: 70%; margin-left: 15%;"><br>
                <h2>COURSE LOGIN INFO</h2><br>
                <hr style="width: 70%; margin-left: 15%;"><br>
                <p>
                    This beginner`s photography course will take you to an advanced level in no 
                    time and fill any gaps of knowledge that may be causing you not to reach your full potential. 
                    You’ll be able to use your camera in all the manual modes and apply the knowledge learnt to 
                    any situation. This course will make you feel completely camera confident and ensure your 
                    pictures stack up against any professional-looking photography.
                    For only <b>13$/month</b>, by login in, this course will put an end to any confusion, 
                    whilst giving you accurate and thorough knowledge in photography. And all that <b>ONLINE</b>.
                </p>
        </div><br><br>
        <div class="courseContent">
            <hr style="width: 70%; margin-left: 15%;"><br>
            <h2>TOPICS YOU WILL LEARN DURING THE COURSE:</h2><br>
            <hr style="width: 70%; margin-left: 15%;"><br>
                <p>
                    Some of the topics that you are going to master through this course are:
                    camera kits and recommended equipment, introduction to camera settings, focusing, getting your 
                    pictures pin sharp, composition, lenses, focal lengths, crop and full frame sensors ,metering, ISO,
                    apertures and depth of field, shutter speeds, controlling movement and slow sync flash, balancing exposures,
                    resolution, understanding light and white balance, night photography and...Painting with Light! 
                </p>
        </div><br><br>
        <div class="questions">
                <h3>HOW LONG DOES IT TAKE TO COMPLETE THIS COURSE?</h3><br>
                <hr style="width: 70%; margin-left: 15%;"><br>
                <p>
                    The course can be completed in your own time, at your own pace. 
                    On average someone with a full-time job will take 1 to 2 months to complete the course.
                </p><br>
                <h3>WHAT EQUIPMENT TO I NEED?</h3><br>
                <p>You will need a camera that has manual settings and a standard kit lens. 
                    This is generally a DSLR or mirrorless camera, but some bridge cameras are also fine. 
                    An easy way to tell if your camera is suitable is to look at the top of it and see if it has a 
                    dial with the letter M (for manual) on it. You will also need a tripod.
                </p><br>
                <h3>DO I GET A CERTIFICATE WITH THIS COURSE?</h3><br>
                <p>
                    Yes - On completion of all our all courses, you receive a certificate from The School of Photography.
                </p>
        </div><br><br>
        <hr style="width: 70%; margin-left: 15%;"><br><br>
    </div>

    <div class="fundi">
        <img src="CourseLogin_Pictures/CourseLogin2.jpg" alt="">
        <img src="CourseLogin_Pictures/CourseLogin1.jpg" alt="">
        <img src="CourseLogin_Pictures/CourseLogin3.jpg" alt="">
    </div>
    <?php include('footer.php') ?>

</body>
</html>