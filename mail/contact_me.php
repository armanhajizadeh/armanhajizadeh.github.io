<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'path/to/PHPMailer/Exception.php';
require 'path/to/PHPMailer/PHPMailer.php';
require 'path/to/PHPMailer/SMTP.php';

// Check for empty fields
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
   echo "No arguments Provided!";
   return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']);
$email_address = strip_tags(htmlspecialchars($_POST['email']);
$phone = strip_tags(htmlspecialchars($_POST['phone']);
$message = strip_tags(htmlspecialchars($_POST['message']);

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP configuration for Gmail
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'arman.hajizadeh@gmail.com'; // Your Gmail email address
$mail->Password = 'YM2740851848'; // Your Gmail password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Sender information
$mail->setFrom('your-email@gmail.com', 'Your Name'); // Your Gmail email address and name
$mail->addAddress('arman.hajizadeh@gmail.com'); // Recipient email address
$mail->addReplyTo($email_address, $name); // Reply-to email address

// Email content
$mail->isHTML(false); // Set to true if you want to send HTML email
$mail->Subject = "Website Contact Form: $name";
$mail->Body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

if ($mail->send()) {
   return true;
} else {
   echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
   return false;
}
?>
