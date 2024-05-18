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
    }
}