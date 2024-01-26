<?php
require_once 'ContactFormRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if (!$id) {
        echo "Invalid request. Missing contact form ID.";
        exit;
    }

    $contactFormRepository = new ContactFormRepository();

    $existingContactForm = $contactFormRepository->getContactFormDataById($id);

    if (!$existingContactForm) {
        echo "Contact form not found.";
        exit;
    }

    $data = array(
        'first_name' => $_POST['first-name'] ?? $existingContactForm['first_name'],
        'last_name' => $_POST['last-name'] ?? $existingContactForm['last_name'],
        'fiance_first_name' => $_POST['fiance-first-name'] ?? $existingContactForm['fiance_first_name'],
        'fiance_last_name' => $_POST['fiance-last-name'] ?? $existingContactForm['fiance_last_name'],
        'email' => $_POST['email'] ?? $existingContactForm['email'],
        'phone' => $_POST['phone'] ?? $existingContactForm['phone'],
        'event_date' => $_POST['event-date'] ?? $existingContactForm['event_date'],
        'event_type' => $_POST['event-type'] ?? $existingContactForm['event_type'],
        'event_location' => $_POST['event-location'] ?? $existingContactForm['event_location'],
        'guests' => $_POST['guests'] ?? $existingContactForm['guests'],
        'love_story' => $_POST['love-story'] ?? $existingContactForm['love_story'],
        'contact_method' => $_POST['contact-method'] ?? $existingContactForm['contact_method'],
        'how_found' => $_POST['how-found'] ?? $existingContactForm['how_found']
    );

    $result = $contactFormRepository->updateContactFormData($id, $data);

    if ($result) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Failed to update contact form.";
        exit;
    }
} else {
    echo "Invalid request. This script should be accessed via POST.";
    exit;
}
?>