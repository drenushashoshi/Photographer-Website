<?php
require_once 'databaseConnection.php';
require_once 'ContactFormRepository.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== "admin") {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$contactFormId = $_GET['id'];

$contactFormRepository = new ContactFormRepository();

$contactForm = $contactFormRepository->getContactFormDataById($contactFormId);

if (!$contactForm) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Booking.css">
    <title>Edit Contact Form</title>
</head>

<body>
    <header>
        <?php include('Header.php'); ?>
    </header>
    <main>
        <div class="bgphoto">
            <h2>Edit Contact Form</h2>
        </div>
        <img src="Booking_Pictures/PlanningPic.png" alt="">

        <form method="post" action="update_contact_form.php">
            <label for="first-name">Your Name:</label>
            <div id="your-name">
                <label for="first-name"></label>
                <input type="text" id="first-name" name="first-name" placeholder="First Name"
                    value="<?php echo htmlspecialchars($contactForm['first_name']); ?>" required>

                <label for="last-name"></label>
                <input type="text" id="last-name" name="last-name" placeholder="Last Name"
                    value="<?php echo htmlspecialchars($contactForm['last_name']); ?>" required>
            </div>
            <div class="error-message" id="first-name-error"></div>
            <div class="error-message" id="last-name-error" style="margin-left: 60%;"></div>

            <label for="fiance-name">Fiancé's Name:</label>
            <div id="fiance-name">
                <label for="fiance-first-name"></label>
                <input type="text" id="fiance-first-name" name="fiance-first-name" placeholder="First Name"
                    value="<?php echo htmlspecialchars($contactForm['fiance_first_name']); ?>" required>

                <label for="fiance-last-name"></label>
                <input type="text" id="fiance-last-name" name="fiance-last-name" placeholder="Last Name"
                    value="<?php echo htmlspecialchars($contactForm['fiance_last_name']); ?>" required>
            </div>
            <div class="error-message" id="fiance-first-name-error"></div>
            <div class="error-message" id="fiance-last-name-error" style="margin-left: 60%;"></div>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contactForm['email']); ?>"
                required>
            <div class="error-message" id="email-error"></div>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($contactForm['phone']); ?>"
                required>
            <div class="error-message" id="phone-error"></div>

            <label for="event-date">Event Date:</label>
            <input type="date" id="event-date" name="event-date"
                value="<?php echo htmlspecialchars($contactForm['event_date']); ?>" required>
            <div class="error-message" id="notfilled-error-event-date"></div>

            <label for="event-type">Type of Event:</label>
            <select id="event-type" name="event-type" required>
                <option value="" disabled>Select an option</option>
                <option value="wedding" <?php echo ($contactForm['event_type'] === 'wedding') ? 'selected' : ''; ?>>
                    Wedding</option>
                <option value="engagement" <?php echo ($contactForm['event_type'] === 'engagement') ? 'selected' : ''; ?>>
                    Engagement</option>
                <option value="other" <?php echo ($contactForm['event_type'] === 'other') ? 'selected' : ''; ?>>Other
                </option>
            </select>
            <div class="error-message" id="notfilled-error-event-type"></div>

            <label for="event-location">Event Location (Venue):</label>
            <input type="text" id="event-location" name="event-location"
                value="<?php echo htmlspecialchars($contactForm['event_location']); ?>" required>
            <div class="error-message" id="notfilled-error-event-location"></div>

            <label for="guests">Number of Guests:</label>
            <select id="guests" name="guests" required>
                <option value="" disabled>Select an option</option>
                <option value="just-us" <?php echo ($contactForm['guests'] === 'just-us') ? 'selected' : ''; ?>>Just Us 2
                </option>
                <option value="10-20" <?php echo ($contactForm['guests'] === '10-20') ? 'selected' : ''; ?>>10-20</option>
                <option value="20-50" <?php echo ($contactForm['guests'] === '20-50') ? 'selected' : ''; ?>>20-50</option>
                <option value="50-100" <?php echo ($contactForm['guests'] === '50-100') ? 'selected' : ''; ?>>50-100
                </option>
                <option value="100-200" <?php echo ($contactForm['guests'] === '100-200') ? 'selected' : ''; ?>>100-200
                </option>
                <option value="200-300" <?php echo ($contactForm['guests'] === '200-300') ? 'selected' : ''; ?>>200-300
                </option>
            </select>
            <div class="error-message" id="notfilled-error-guests"></div>

            <label for="love-story">YAS THE BEST PART - Tell me about you two:</label>
            <textarea id="love-story" name="love-story"
                required><?php echo htmlspecialchars($contactForm['love_story']); ?></textarea>
            <div class="error-message" id="notfilled-error-love-story"></div>

            <label for="contact-method">Preferred Method of Contact:</label>
            <select id="contact-method" name="contact-method" required>
                <option value="" disabled>Select an option</option>
                <option value="email" <?php echo ($contactForm['contact_method'] === 'email') ? 'selected' : ''; ?>>Email
                </option>
                <option value="phone" <?php echo ($contactForm['contact_method'] === 'phone') ? 'selected' : ''; ?>>Phone
                </option>
            </select>
            <div class="error-message" id="notfilled-error-contact-method"></div>

            <label for="how-found">Where'd you find me?</label>
            <select id="how-found" name="how-found" required>
                <option value="" disabled>Select an option</option>
                <option value="google" <?php echo ($contactForm['how_found'] === 'google') ? 'selected' : ''; ?>>Google
                </option>
                <option value="social-media" <?php echo ($contactForm['how_found'] === 'social-media') ? 'selected' : ''; ?>>Social Media</option>
                <option value="referral" <?php echo ($contactForm['how_found'] === 'referral') ? 'selected' : ''; ?>>
                    Referral</option>
                <option value="other" <?php echo ($contactForm['how_found'] === 'other') ? 'selected' : ''; ?>>Other
                </option>
            </select>
            <div class="error-message" id="notfilled-error-how-found"></div>

            <input type="hidden" name="id" value="<?php echo $contactForm['id']; ?>">
            <br>

            <button type="submit" onclick="validateForm(event)">Update</button>
        </form>


    </main>
    <footer>

    </footer>
</body>

</html>