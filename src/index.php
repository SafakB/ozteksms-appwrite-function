<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/utils.php');


return function ($context) {

    throw_if_missing($_ENV, [
        "OZTEK_TEST_PHONE",
        "OZTEK_TEST_VAR"
    ]);

    $OZTEK_TEST_PHONE = $_ENV['OZTEK_TEST_PHONE'];

    $debug = sendSms($OZTEK_TEST_PHONE, 'Hello, World!');

    return $context->res->send($debug,200, ['Content-Type' => 'text/html']);
   
    $context->log('Hello, Logs!' . $OZTEK_TEST_PHONE); 
    $context->error('Hello, Errors!');


    if ($context->req->method === 'GET') {     
        return $context->res->send('Hello, World!');
    }

    // `res.json()` is a handy helper for sending JSON
    return $context->res->json([
        'motto' => 'Build like a team of hundreds_',
        'learn' => 'https://appwrite.io/docs',
        'connect' => 'https://appwrite.io/discord',
        'getInspired' => 'https://builtwith.appwrite.io',
    ]);
};
