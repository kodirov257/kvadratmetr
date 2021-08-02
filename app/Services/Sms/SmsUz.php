<?php

namespace App\Services\Sms;

use GuzzleHttp\Client;

class SmsUz implements SmsSender
{
    private $username;
    private $password;
    private $url;
    private $client;
    private $smsc;
    private $from;
    private $charset;
    private $coding;

    public function __construct($url, $username, $password, $smsc, $from, $charset, $coding)
    {
        if (empty($username) || empty($password)) {
            throw new \InvalidArgumentException('Username or password must be set.');
        }

        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
        $this->client = new Client();
        $this->smsc = $smsc;
        $this->from = $from;
        $this->charset = $charset;
        $this->coding = $coding;
    }

    public function send($number, $text): void
    {
        $this->client->get($this->url, [
            'query' => [
                'username' => $this->username,
                'password' => $this->password,
                'smsc' => $this->smsc,
                'from' => $this->from,
                'to' => '+' . trim($number, '+'),
                'charset' => $this->charset,
                'coding' => $this->coding,
                'text' => $text
            ],
        ]);
    }
}