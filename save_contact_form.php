<?php
require_once 'databaseConnection.php';
$dbConnection = new DatabaseConnection();

$conn = $dbConnection->startConnection();

if (!$conn) {
    die("Connection failed. Please check your database settings.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $fianceFirstName = $_POST['fiance-first-name'];
    $fianceLastName = $_POST['fiance-last-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $eventDate = $_POST['event-date'];
    $eventType = $_POST['event-type'];
    $eventLocation = $_POST['event-location'];
    $guests = $_POST['guests'];
    $loveStory = $_POST['love-story'];
    $contactMethod = $_POST['contact-method'];
    $howFound = $_POST['how-found'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    if (!preg_match("/^\d{9}$/", $phone)) {
        echo "Invalid phone number format!";
        exit;
    }

    $currentDate = date('Y-m-d');
    if ($eventDate < $currentDate) {
        echo "Event date must be in the future!";
        exit;
    }

    $allowedGuests = array('just-us', '10-20', '20-50', '50-100', '100-200', '200-300');
    if (!in_array($guests, $allowedGuests)) {
        echo "Invalid number of guests!";
        exit;
    }

    $minLoveStoryLength = 0;
    $maxLoveStoryLength = 1000;
    $loveStoryLength = strlen($loveStory);
    if ($loveStoryLength < $minLoveStoryLength || $loveStoryLength > $maxLoveStoryLength) {
        echo "Love story must be between $minLoveStoryLength and $maxLoveStoryLength characters!";
        exit;
    }

    $allowedContactMethods = array('email', 'phone');
    if (!in_array($contactMethod, $allowedContactMethods)) {
        echo "Invalid contact method!";
        exit;
    }

    $allowedHowFoundOptions = array('google', 'social-media', 'referral', 'other');
    if (!in_array($howFound, $allowedHowFoundOptions)) {
        echo "Invalid option for how you found me!";
        exit;
    }

    $sql = "INSERT INTO contact_form_data (first_name, last_name, fiance_first_name, fiance_last_name, email, phone, event_date, event_type, event_location, guests, love_story, contact_method, how_found) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstName, $lastName, $fianceFirstName, $fianceLastName, $email, $phone, $eventDate, $eventType, $eventLocation, $guests, $loveStory, $contactMethod, $howFound]);
    } catch (PDOException $e) {
        echo "Error saving contact form data: " . $e->getMessage();
    }
}
?>