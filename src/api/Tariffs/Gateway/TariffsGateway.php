<?php

namespace Nextbike\Api\Tariffs\Gateway;
use Nextbike\Api\Tariffs\Command\TariffsCommand;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Account\Command\ListAccountCommand;
use Nextbike\Api\Account\Command\LoginAccountCommand;
use Nextbike\Api\Account\Command\RegisterAccountCommand;
use Nextbike\Api\Account\Command\UpdateCustomerDataCommand;

class TariffsGateway extends AbstractGateway
{

    public function getTariffs(TariffsCommand $command)
    {
        $data = [
            "domain" => $command->getDomain(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('tariffs', $data);
    }


}