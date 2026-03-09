<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Here you can add code to process the form data,
    // for example, send an email, save to a database, etc.
    
    $to = "Sundas123@gmail.com"; // Replace with your email address
    $headers = "From: " . $email . "
" .
               "Reply-To: " . $email . "
" .
               "X-Mailer: PHP/" . phpversion();

    $email_subject = "New Contact Form Submission: " . $subject;
    $email_body = "You have received a new message from your website contact form.

".
                  "Name: " . $name . "
".
                  "Email: " . $email . "
".
                  "Subject: " . $subject . "
".
                  "Message:
" . $message;

    if (mail($to, $email_subject, $email_body, $headers)) {
        // Success message or redirect
        echo "Thank you for your message! We will get back to you shortly.";
    } else {
        // Error message
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
}
?>