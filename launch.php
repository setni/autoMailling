<?php

// Launch file

require 'EmailBot.class.php';

$nameFile = 'traitement.txt';
$yourAdress = 'name@domain.com';
$object = 'Object of your email';
$text = 'Text of your email (Better if it\'s HTML)';
$domain = '@plasticomnium.com';


try {
    $launch = new EmailBot($nameFile, $yourAdress, $object, $text, $domain);
    print_r($launch->emailBot());
} catch (Exception $e) {
    die($e->getMessage());
}
