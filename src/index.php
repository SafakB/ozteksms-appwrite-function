<?php
require_once(__DIR__ . '/../vendor/autoload.php');


return function ($context) {

    throw_if_missing($_ENV, [
        "OZTEK_TEST_PHONE",
        "OZTEK_TEST_VAR"
    ]);

    $OZTEK_TEST_PHONE = $_ENV['OZTEK_TEST_PHONE'];
   
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
