<?php

namespace Nextbike\Api\Account\Command;

use Framework\Command\AbstractCommand;

class RegisterAccountCommand extends AbstractCommand
{

    private $telefon_number;

    private $email_address;

    private $forename;

    private $name;

    /**
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param mixed $pin
     */
    public function setPin($pin)
    {
        $this->pin = $pin;
    }

    private $pin;

    /**
     * @return mixed
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * @param mixed $forename
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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