<?php

// Import the PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load the PHPMailer library
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create a new instance of the PHPMailer class
$mail = new PHPMailer(true);

// Set the SMTP server
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = '102a5752cbf1ab';
$mail->Password = '1e057b1ea4d4a4';
$mail->SMTPSecure = 'tls';
$mail->Port = 2525;

// Set the recipient, subject, and message
$mail->setFrom($email, $name);
$mail->addAddress('vblibin885@gmail.com');
$mail->Subject = 'New Contact Form Submission';
$mail->Body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

// Send the email
if ($mail->send()) {
    echo "Thank you for your message. We'll be in touch shortly.";
} else {
    echo "Error: ".$mail->ErrorInfo;
}

?>
