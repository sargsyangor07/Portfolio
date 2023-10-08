<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$errors = [];

function sendEmail($name, $lName, $email, $subject, $message) {
    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sgor16531@gmail.com';
    $mail->Password = 'pvvccclkdebogzze';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('sgor16531@gmail.com');
    $mail->addAddress('sgor16531@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Name: $name<br>Last Name: $lName<br>Email: $email<br>Message: $message";

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (strlen($name) < 2) {
        $errors[] = "Name should have a minimum of 2 letters.";
    }
    if (strlen($lName) < 3) {
        $errors[] = "Last name should have a minimum of 3 letters.";
    }
    if (strlen($email) < 8 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address with a minimum of 8 characters.";
    }
    if (strlen($subject) < 5) {
        $errors[] = "Subject should have a minimum of 5 letters.";
    }
    if (strlen($message) < 10) {
        $errors[] = "Message should have a minimum of 10 characters.";
    }

    if (empty($errors)) {
        if (sendEmail($name, $lName, $email, $subject, $message)) {
            header('Location: index.php');
            exit();
        } else {
            $errors[] = "Failed to send email.";
        }
    }
}
if (!empty($errors)) {
    echo '<div style="background-color: #ffdddd; color: #ff0000; padding: 20px; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; font-size: 35px; line-height: 1.5;">';
    echo '<strong>Error:</strong><br>';
    foreach ($errors as $text) {
        echo $text . "<br>";
    }
    echo'Now you can go back and fill in the correct and relevant data.';
    echo '</div>';
}
?>