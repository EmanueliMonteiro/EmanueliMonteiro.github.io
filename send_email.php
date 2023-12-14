<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.html?error=validation");
        exit;
    }

    $to = "emanueliumonteiro@gmail.com";
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email\r\n";

    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        $redirectUrl = isset($_POST['return_url']) ? $_POST['return_url'] : 'index.html';
        header("Location: $redirectUrl?success=1");
        exit;
    } else {
        $redirectUrl = isset($_POST['return_url']) ? $_POST['return_url'] : 'index.html';
        header("Location: $redirectUrl?error=2");
        exit;
    }
}
?>
