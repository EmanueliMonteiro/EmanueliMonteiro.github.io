<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "emanueliumonteiro@gmail.com";
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email\r\n";

    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        if (isset($_POST['return_url'])) {
            header("Location: " . $_POST['return_url'] . "?success=1");
        } else {
            header("Location: index.html?success=1");
        }
        exit;
    } else {
        if (isset($_POST['return_url'])) {
            header("Location: " . $_POST['return_url'] . "?error=1");
        } else {
            header("Location: index.html?error=1");
        }
        exit;
    }
}
?>