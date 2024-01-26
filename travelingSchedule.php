<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$hide = "hide";

if (isset($_SESSION['roli']) && $_SESSION['roli'] == "admin") {
    $hide = "";
}

require('databaseConnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["mail"]);

    $nameRegex = '/^[A-Z][a-zA-Z]{2,}$/';
    $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

    if (!preg_match($nameRegex, $name)) {
        $errors['name'] = 'Invalid name.';
    }

    if (!preg_match($emailRegex, $email)) {
        $errors['email'] = 'Invalid email.';
    }

    $dbConnection = new DatabaseConnection();
    $conn = $dbConnection->startConnection();

    if ($conn) {
        try {
            $query = "INSERT INTO newsLetter_subscribers (name, email) VALUES (:name, :email)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            echo '<script>alert("Form submitted successfully!");</script>';
        } catch (PDOException $e) {
            echo '<script>alert("Error submitting form. Please try again.\\n\\n\\n*p.s Check if you already used this email to subscribe");</script>';
            error_log("Error: " . $e->getMessage(), 0);
        } finally {
            $dbConnection = null;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveling Schedule</title>
    <link rel="stylesheet" href="travelingSchedule.css">
    <link href="https://fonts.cdnfonts.com/css/antro-vectra" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Playfair+Display&family=Work+Sans:wght@300&display=swap');
    </style>
</head>

<body>
    <header>
        <?php include('Header.php'); ?>
    </header>
    <main>
        <div class="bgphoto">
            <h2>TRAVELING SCHEDULE</h2>
        </div>
        <div class="adventure">
            <div class="pictures1">
                <img src="Travel_Pictures/t1.jpg" alt="">
                <img src="Travel_Pictures/t2.jpg" alt="">
                <img src="Travel_Pictures/t3.jpg" alt="">
            </div>
            <div class="adventuretext">
                <h1>LET'S GO ON AN</h1>
                <span>adventure</span>
                <p>Whether it's chillin on a beach on Kauai or hiking the rugged mountains in Patagonia, if your ideal
                    wedding takes place in a spot that you've always dreamed of, I'm THERE. These are my planned travel
                    dates, but I am usually available to fit in a couples shoot or an elopement while I'm there — so
                    please ask me!</p>
                <p>If one of these places jumps out at you as an amazing place to get hitched —I'll be there and can
                    photograph your day without any travel fees!</p>
                <button class="button"><a href="Booking.php">TAKE ME WITH YOU</a></button>
            </div>
            <div class="pictures2">
                <img src="Travel_Pictures/t4.jpg" alt="">
                <img src="Travel_Pictures/t6.jpg" alt="">
                <img src="Travel_Pictures/t7.jpg" alt="" style="width: 300px;height: 200px;">
            </div>
        </div>

        <?php
        include('travelingScheduleData.php');

        echo '<div class="travel">';
        echo '<div class="image">.</div>';
        echo '<div class="travelDate">';
        echo '<h1>Travel Dates</h1>';
        echo '<h6>2024</h6>';
        foreach ($travelDates as $date => $location) {
            echo '<p>' . $location . '</p>';
            echo '<h4>' . $date . '</h4>';
        }
        echo '<button class="button"><a href="Booking.php">CONTACT</a></button>';
        echo '</div>';
        echo '</div>';
        ?>
        <form id="newsletter-form" method="post" onsubmit="return validateForm()">
            <div class="container">
                <h2>Sign-Up for our Newsletter</h2>
                <p>Through them you'll know for any changes in my schedule</p>
            </div>

            <div class="container" style="background-color: white">
                <input type="text" placeholder="Name" name="name" id="name" required>
                <div class="error-message" id="name-error">
                    <?php echo isset($errors['name']) ? $errors['name'] : ''; ?>
                </div>

                <input type="text" placeholder="Email address" name="mail" id="mail" required>
                <div class="error-message" id="mail-error">
                    <?php echo isset($errors['email']) ? $errors['email'] : ''; ?>
                </div>
            </div>

            <div class="container">
                <input type="submit" value="Subscribe">
            </div>
        </form>
    </main>
    <?php include('footer.php') ?>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var mail = document.getElementById("mail").value;

            let mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let nameRegex = /^[A-Z][a-zA-Z]{2,}$/;

            let emailError = document.getElementById('mail-error');
            emailError.innerText = '';
            let nameError = document.getElementById('name-error');
            nameError.innerText = '';
            if (!nameRegex.test(name)) {
                nameError.innerText = '*Invalid name.';
                return false;
            }
            if (!mailRegex.test(mail)) {
                emailError.innerText = '*Invalid email.';
                return false;
            }

            return true;
        }
    </script>
</body>

</html>