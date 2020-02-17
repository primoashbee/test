<?php

require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$ip = isset($_SERVER['HvendorTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$email = new \SendGrid\Mail\Mail(); 

$email->setFrom("ashbeemorgado11@gmail.com", "Ashbee Morgado");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("ashbee.morgado@icloud.com", "Ashbee Morgado - iCloud");
$email->addContent("text/plain", $ip);

$sendgrid = new \SendGrid(getenv('SendGrid_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}