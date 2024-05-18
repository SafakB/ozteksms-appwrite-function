<?php

require_once(__DIR__ . '/OztekSms.php');

/**
 * Returns the contents of a file in the static folder
 * @param string $fileName
 * @return string Contents of static/{$fileName}
 */
function get_static_file(string $fileName): string
{
    $filePath = dirname(__FILE__) . '/../static/' . $fileName;
    return file_get_contents($filePath);
}

/**
 * Throws an exception if any of the keys are missing from the object
 * @param array|object $obj
 * @param string[] $keys
 * @throws \Exception
 */
function throw_if_missing(mixed $obj, array $keys): void
{
    $missing = [];
    foreach ($keys as $key) {
        if (!isset($obj[$key]) || empty($obj[$key])) {
            $missing[] = $key;
        }
    }
    if (count($missing) > 0) {
        throw new \Exception('Missing required fields: ' . implode(', ', $missing));
    }
}

function sendSms($to, $body)
{
    $sms = new OztekSms(
        $_ENV['OZTEK_USER_ID'],
        $_ENV['OZTEK_USERNAME'],
        $_ENV['OZTEK_PASSWORD'],
        $_ENV['OZTEK_ORIGINATOR']
    );
    
    return $sms->sendSms($to, $body);
}

/**
 * Validates an international phone number
 * @param string $phoneNumber
 * @return bool
 */

function validatePhone($phoneNumber) {
    // E.164 validate standart
    $pattern = '/^\+?[1-9]\d{1,14}$/';

    // Reges pattern for international phone number
    if (preg_match($pattern, $phoneNumber)) {
        return true;
    } else {
        return false;
    }
}