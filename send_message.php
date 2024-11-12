<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate input (just for safety)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Email details
    $to = "nepalprabhat21@gmail.com";  
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/html; charset=UTF-8";

    $email_subject = "New Contact Form Message: " . $subject;
    $email_body = "<html><body>";
    $email_body .= "<h2>New Message from " . $name . "</h2>";
    $email_body .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_body .= "<p><strong>Message:</strong> " . nl2br($message) . "</p>";
    $email_body .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_body .= "</body></html>";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
