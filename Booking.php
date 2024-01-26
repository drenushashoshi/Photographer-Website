<?php
require_once 'save_contact_form.php';
require_once 'databaseConnection.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$hide = "hide";
if (isset($_SESSION['roli']) && $_SESSION['roli'] == "admin") {
  $hide = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Booking.css">
  <title>Booking</title>
</head>

<body>
  <header>
    <?php include('Header.php'); ?>
  </header>
  <main>
    <div class="bgphoto">
      <h2>CONTACT ME</h2>
    </div>
    <img src="Booking_Pictures/PlanningPic.png" alt="">

    <form id="myform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">


      <label for=" your-name">Your Name:</label>
      <div id="your-name">
        <label for="first-name"></label>
        <input type="text" id="first-name" name="first-name" placeholder="First Name" required>

        <label for="last-name"></label>
        <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
      </div>
      <div class="error-message" id="first-name-error"></div>
      <div class="error-message" id="last-name-error" style="margin-left: 60%;"></div>

      <label for="fiance-name">Fiancé's Name:</label>
      <div id="fiance-name">
        <label for="fiance-first-name"></label>
        <input type="text" id="fiance-first-name" name="fiance-first-name" placeholder="First Name" required>

        <label for="fiance-last-name"></label>
        <input type="text" id="fiance-last-name" name="fiance-last-name" placeholder="Last Name" required>
      </div>
      <div class="error-message" id="fiance-first-name-error"></div>
      <div class="error-message" id="fiance-last-name-error" style="margin-left: 60%;"></div>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>
      <div class="error-message" id="email-error"></div>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>
      <div class="error-message" id="phone-error"></div>

      <label for="event-date">Event Date:</label>
      <input type="date" id="event-date" name="event-date" required>
      <div class="error-message" id="notfilled-error-event-date"></div>

      <label for="event-type">Type of Event:</label>
      <select id="event-type" name="event-type" required>
        <option value="" disabled selected>Select an option</option>
        <option value="wedding">Wedding</option>
        <option value="engagement">Engagement</option>
        <option value="other">Other</option>
      </select>
      <div class="error-message" id="notfilled-error-event-type"></div>

      <label for="event-location">Event Location (Venue):</label>
      <input type="text" id="event-location" name="event-location" required>
      <div class="error-message" id="notfilled-error-event-location"></div>

      <label for="guests">Number of Guests:</label>
      <select id="guests" name="guests" required>
        <option value="" disabled selected>Select an option</option>
        <option value="just-us">Just Us 2</option>
        <option value="10-20">10-20</option>
        <option value="20-50">20-50</option>
        <option value="50-100">50-100</option>
        <option value="100-200">100-200</option>
        <option value="200-300">200-300</option>
      </select>
      <div class="error-message" id="notfilled-error-guests"></div>

      <label for="love-story">YAS THE BEST PART - Tell me about you two:</label>
      <textarea id="love-story" name="love-story" required></textarea>
      <div class="error-message" id="notfilled-error-love-story"></div>

      <label for="contact-method">Preferred Method of Contact:</label>
      <select id="contact-method" name="contact-method" required>
        <option value="" disabled selected>Select an option</option>
        <option value="email">Email</option>
        <option value="phone">Phone</option>
      </select>
      <div class="error-message" id="notfilled-error-contact-method"></div>

      <label for="how-found">Where'd you find me?</label>
      <select id="how-found" name="how-found" required>
        <option value="" disabled selected>Select an option</option>
        <option value="google">Google</option>
        <option value="social-media">Social Media</option>
        <option value="referral">Referral</option>
        <option value="other">Other</option>
      </select>
      <div class="error-message" id="notfilled-error-how-found"></div>

      <button type="submit" onclick="validateForm(event)">Submit</button>
    </form>
  </main>
  <footer>
    <div class="contact-info">
      <h3>Contact Information</h3>
      <p>Email: example@example.com</p>
      <p>Phone: +1 234 567 890</p>
    </div>
    <div class="social-icons">
      <h3>Follow Me</h3>
      <a href="#"><img src="Booking_Pictures/FacebookIcon.png" alt="Facebook"></a>
      <a href="#"><img src="Booking_Pictures/InstagramIcon.png" alt="Instagram"></a>
      <a href="#"><img src="Booking_Pictures/TwitterIcon.png" alt="Twitter"></a>
    </div>
  </footer>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    let nameRegex = /^[A-Z][a-zA-Z]{2,}$/;
    let surnameRegex = /^[A-Z][a-zA-Z]{2,}$/;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let phoneRegex = /^\d{9}$/;

    function validateForm(event) {
      event.preventDefault();

      let firstName = document.getElementById('first-name');
      let lastName = document.getElementById('last-name');
      let fianceFirstName = document.getElementById('fiance-first-name');
      let fianceLastName = document.getElementById('fiance-last-name');
      let emailInput = document.getElementById('email');
      let phoneInput = document.getElementById('phone');
      let eventDate = document.getElementById('event-date');
      let eventType = document.getElementById('event-type');
      let eventLocation = document.getElementById('event-location');
      let guests = document.getElementById('guests');
      let loveStory = document.getElementById('love-story');
      let contactMethod = document.getElementById('contact-method');
      let howFound = document.getElementById('how-found');

      let firstNameError = document.getElementById('first-name-error');
      let lastNameError = document.getElementById('last-name-error');
      let fianceFirstNameError = document.getElementById('fiance-first-name-error');
      let fianceLastNameError = document.getElementById('fiance-last-name-error');
      let emailError = document.getElementById('email-error');
      let phoneError = document.getElementById('phone-error');
      let notFilledErrorEventDate = document.getElementById('notfilled-error-event-date');
      let notFilledErrorEventType = document.getElementById('notfilled-error-event-type');
      let notFilledErrorEventLocation = document.getElementById('notfilled-error-event-location');
      let notFilledErrorGuests = document.getElementById('notfilled-error-guests');
      let notFilledErrorLoveStory = document.getElementById('notfilled-error-love-story');
      let notFilledErrorContactMethod = document.getElementById('notfilled-error-contact-method');
      let notFilledErrorHowFound = document.getElementById('notfilled-error-how-found');

      firstNameError.innerText = '';
      lastNameError.innerText = '';
      fianceFirstNameError.innerText = '';
      fianceLastNameError.innerText = '';
      emailError.innerText = '';
      phoneError.innerText = '';
      notFilledErrorEventDate.innerText = '';
      notFilledErrorEventType.innerText = '';
      notFilledErrorEventLocation.innerText = '';
      notFilledErrorGuests.innerText = '';
      notFilledErrorLoveStory.innerText = '';
      notFilledErrorContactMethod.innerText = '';
      notFilledErrorHowFound.innerText = '';

      if (!nameRegex.test(firstName.value)) {
        firstNameError.innerText = '*Invalid first name.';
        return;
      }

      if (!nameRegex.test(lastName.value)) {
        lastNameError.innerText = '*Invalid last name.';
        return;
      }

      if (!nameRegex.test(fianceFirstName.value)) {
        fianceFirstNameError.innerText = '*Invalid fiancé\'s first name.';
        return;
      }

      if (!nameRegex.test(fianceLastName.value)) {
        fianceLastNameError.innerText = '*Invalid fiancé\'s last name.';
        return;
      }

      if (!emailRegex.test(emailInput.value)) {
        emailError.innerText = '*Invalid email.';
        return;
      }

      if (phoneInput.value && !phoneRegex.test(phoneInput.value)) {
        phoneError.innerText = '*Invalid phone number.';
        return;
      }

      if (eventDate.value === '') {
        notFilledErrorEventDate.innerText = '*Event Date is required.';
        return;
      }

      if (eventType.value === '') {
        notFilledErrorEventType.innerText = '*Event Type is required.';
        return;
      }

      if (eventLocation.value === '') {
        notFilledErrorEventLocation.innerText = '*Event Location is required.';
        return;
      }

      if (guests.value === '') {
        notFilledErrorGuests.innerText = '*Number of Guests is required.';
        return;
      }

      if (loveStory.value === '') {
        notFilledErrorLoveStory.innerText = '*Love Story is required.';
        return;
      }

      if (contactMethod.value === '') {
        notFilledErrorContactMethod.innerText = '*Preferred Method of Contact is required.';
        return;
      }

      if (howFound.value === '') {
        notFilledErrorHowFound.innerText = '*Where you found me is required.';
        return;
      }
      document.getElementById('myform').submit();
      alert('Contact Form submitted successfully!');
    }
    document.getElementById('myform').addEventListener('submit', validateForm);
  });

  </script>
</body>

</html>