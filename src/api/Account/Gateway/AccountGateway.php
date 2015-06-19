<?php

namespace Nextbike\Api\Account\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Account\Command\ListAccountCommand;
use Nextbike\Api\Account\Command\LoginAccountCommand;
use Nextbike\Api\Account\Command\RegisterAccountCommand;

class AccountGateway extends AbstractGateway
{
    /**
     * @param RegisterAccountCommand $command
     * @return mixed
     */
    public function register(RegisterAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "email" => $command->getEmailAddress(),
            "mobile" => $command->getTelefonNumber(),
            "forname" => $command->getForename(),
            "name" => $command->getName(),
            "pin" => $command->getPin()
        ];

        return $this->getAPIResponse('register', $data);
    }

    /**
     * @param LoginAccountCommand $command
     * @return mixed
     */
    public function login(LoginAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            'mobile' => $command->getMobile(),
            'pin' => $command->getPin()
        ];

        return $this->getAPIResponse('login', $data);
    }

    /**
     * @param ListAccountCommand $command
     * @return mixed
     */
    public function listAccount(ListAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            'loginkey' => $command->getLoginkey(),
        ];

        return $this->getAPIResponse('list', $data);
    }



}