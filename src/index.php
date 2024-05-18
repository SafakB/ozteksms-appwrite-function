<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/utils.php');


return function ($context) {

    throw_if_missing($_ENV, [
        "OZTEK_TEST_PHONE",
        "OZTEK_USER_ID",
        "OZTEK_USERNAME",
        "OZTEK_PASSWORD",
        "OZTEK_ORIGINATOR"
    ]);

    $OZTEK_TEST_PHONE = $_ENV['OZTEK_TEST_PHONE'];

    $result = sendSms($OZTEK_TEST_PHONE, 'Hello, World!');
    
    if(!isset($result['success'])){
        $context->log("Wrong response from sendSms function");
        return $context->res->json([
            'message' => 'Error88',
            'success' => false
        ]);
    }

    if(!$result['success']){
        $context->log("Error: ".$result['message']);
        return $context->res->json([
            'message' => 'Error',
            'success' => false
        ]);
    }
    $context->log("Sended message successfully");
    return $context->res->json([
        'message' => 'Sended message successfully',
        'success' => true
    ]);
   

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
