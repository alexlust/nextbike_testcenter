<?php

namespace Nextbike\Api\Account\Command;

class CreateAccountCommand
{
    private $api_key;

    private $telefon_number;

    private $email_address;

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param mixed $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param mixed $email_address
     */
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;
    }

    /**
     * @return mixed
     */
    public function getTelefonNumber()
    {
        return $this->telefon_number;
    }

    /**
     * @param mixed $telefon_number
     */
    public function setTelefonNumber($telefon_number)
    {
        $this->telefon_number = $telefon_number;
    }


}