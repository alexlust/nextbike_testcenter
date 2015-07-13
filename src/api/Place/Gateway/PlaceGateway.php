<?php

namespace Nextbike\Api\Place\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Place\Command\SetStationNumberCommand;

class PlaceGateway extends AbstractGateway
{
    public function setStationNumber(SetStationNumberCommand $command)
    {
        $data = [
            "terminal_id" => $command->getTerminalId(),
            "place" => $command->getPlace(),
            "loginkey" => $command->getLoginkey(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('setStationNumber', $data);
    }
}