<?php

namespace Nextbike\Api\Account\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Account\Command\CreateAccountCommand;

class AccountGateway extends AbstractGateway
{
    /**
     * @param CreateAccountCommand $command
     * @return mixed
     */
    public function createAccount(CreateAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "emailAddress" => $command->getEmailAddress(),
            "telefonNumber" => $command->getTelefonNumber()
        ];

        $response = $this->get('createAccount', $data);

        return $response;
    }
}