<?php

namespace App\Services;

interface SMSInterface
{
    /**
     * @param string $msg
     * @return mixed
     */
    public function sendMessage(string $msg);
}