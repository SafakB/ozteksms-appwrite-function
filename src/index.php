<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/utils.php');


return function ($context) {

    throw_if_missing($_ENV, [
        "OZTEK_USER_ID",
        "OZTEK_USERNAME",
        "OZTEK_PASSWORD",
        "OZTEK_ORIGINATOR"
    ]);

    if(!isset($context->req->headers['content-type'])){
        $context->log("Missing content type");
        return $context->res->json([
            'message' => 'Missing content type',
            'success' => false
        ]);
    }

    if($context->req->headers['content-type'] !== 'application/json'){
        $context->log("Invalid content type");
        return $context->res->json([
            'message' => 'Invalid content type',
            'success' => false
        ]);
    }

    if (!isset($context->req->body['to']) || !isset($context->req->body['message'])) {
        $context->log("Missing required fields");
        return $context->res->json([
            'message' => 'Missing required fields',
            'success' => false
        ]);
    }

    $to = $context->req->body['to'];
    $message = $context->req->body['message'];

    

    if (!validatePhone($to)) {
        $context->log("Invalid phone number");
        return $context->res->json([
            'message' => 'Invalid phone number',
            'success' => false
        ]);
    }


    $result = sendSms($to, $message);
    
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
   
};
