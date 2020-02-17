<?php

require "vendor/autoload.php";

$ip = isset($_SERVER['HvendorTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$email = new \SendGrid\Mail\Mail(); 

$email->setFrom("ashbeemorgado11@gmail.com", "Ashbee Morgado");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("ashbee.morgado@icloud.com", "Ashbee Morgado - iCloud");
$email->addContent("text/plain", $ip);

$sendgrid = new \SendGrid(( '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'));
try {
    $response = $sendgrid->send($email);

} catch (Exception $e) {
    //echo 'Caught exception: '. $e->getMessage() ."\n";
}