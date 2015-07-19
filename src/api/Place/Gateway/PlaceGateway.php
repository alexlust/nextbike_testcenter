<?php

namespace Nextbike\Api\Place\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Place\Command\SetStationNumberCommand;
use Nextbike\Api\Place\Command\SetRackIdsCommand;

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

    public function setRackIds(SetRackIdsCommand $command)
    {
        $data = [
            "terminal_id" => $command->getTerminalId(),
            "rack_ids" => $command->getRackIds(),
            "place_id" => $command->getPlaceId(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('setRackIds', $data);
    }
}