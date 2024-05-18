<?php

class OztekSms{

    private $userId;
    private $username;
    private $password;
    private $orginator;
    private $url = 'http://www.oztekbayi.com/panel/smsgonder1Npost.php';


    public function __construct($userId, $username, $password, $orginator)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->orginator = $orginator;
    }

    public function sendSmsTest($to, $body){
        $type           = 'Normal';
        $time           = '2014-04-07 10:00:00';
        $timeout        = '2014-04-07 17:00:00';
        $xmlString = 'data=<sms>
        <kno>' . $this->userId . '</kno> 
        <kulad>' . $this->username . '</kulad> 
        <sifre>' . $this->password . '</sifre>    
        <gonderen>' . $this->orginator . '</gonderen>
        <mesaj>' . $body . '</mesaj> 
        <numaralar>' . $to . '</numaralar>
        <tur>' . $type . '</tur> 
        </sms>';

        return $xmlString;
    }
    

    public function sendSms($to, $body)
    {
        $type           = 'Normal';
        $time           = '2014-04-07 10:00:00';
        $timeout        = '2014-04-07 17:00:00';
        $xmlString = 'data=<sms>
        <kno>' . $this->userId . '</kno> 
        <kulad>' . $this->username . '</kulad> 
        <sifre>' . $this->password . '</sifre>    
        <gonderen>' . $this->orginator . '</gonderen>
        <mesaj>' . $body . '</mesaj> 
        <numaralar>' . $to . '</numaralar>
        <tur>' . $type . '</tur> 
        </sms>';

        $Veriler = $xmlString;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($ch);
        curl_close($ch);

        return $this->parseResponse($response);
    }

    function parseResponse($line) {
        $result = [
            "success" => true,
            "message" => ""
        ];
    
        $parts = explode(":", $line);
    
        if (count($parts) == 7) {
            if ($parts[0] == "1") {
                $result["message"] = "1: Success";
            } elseif ($parts[0] == "2") {
                $result["success"] = false;
                $result["message"] = "2: Error - " . $parts[1];
            } else {
                $result["success"] = false;
                $result["message"] = "Unknow format" . $line;
            }
        } elseif (count($parts) == 2 && $parts[0] == "2") {
            $result["success"] = false;
            $result["message"] = "2: Error - " . $parts[1];
        } else {
            $result["success"] = false;
            $result["message"] = "Unknow format" . $line;
        }
    
        return $result;
    }
}