<?php
include_once "ContactFormRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $contactFormRepository = new ContactFormRepository();
    $id = $_GET['id'];

    $success = $contactFormRepository->deleteContactFormData($id);

    if ($success) {
        echo "<script>alert('Contact form data deleted successfully!')</script>";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Failed to delete contact form data.')</script>";
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
