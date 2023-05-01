<?php

$subject = 'Test mail';

echo '======' . "\n";
echo $subject . "\n";
echo '======' . "\n";

$firstname = "Kirill";
$text1 = "firstname: {$firstname}" . "\n";
$text2 = "This is a test email message.";

$to = "galagan.k.a.01@gmail.com";
$headers = "From: k.a.galagan@student.khai.edu" . "\r\n" .
    "CC: k.a.galagan@student.khai.edu";
$message = $text1 . $text2;

echo $message;


if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email sending failed.";
}

echo ini_get("smtp_port"); // получить переменную конфигурации
ini_set("smtp_port", "587"); // задать переменную конфигурации

die;

