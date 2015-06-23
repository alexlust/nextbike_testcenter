<?php
namespace Nextbike\Api\Bike\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;
use Nextbike\Api\Bike\Command\RentCommand;
use Nextbike\Api\Bike\Command\ReturnCommand;

class BikeGateway extends AbstractGateway
{
    /**
     * @param GetBikeStateCommand $command
     * @return mixed
     */
    public function getBikeState(GetBikeStateCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "bike" => $command->getBikeNumber(),
        ];

        return $this->getAPIResponse('getBikeState', $data);
    }

    public function rent(RentCommand $command){
        $data = [
                "apikey" => $command->getApiKey(),
                "loginkey" => $command->getLoginkey(),
                "bike" => $command->getBikeNumber(),
        ];

        return $this->getAPIResponse('rent', $data);
    }

    public function returnBike(ReturnCommand $command){
        $data = [
                "apikey" => $command->getApiKey(),
                "loginkey" => $command->getLoginkey(),
                "bike" => $command->getBikeNumber(),
                "place"=> $command->getPlaceId()
        ];

        return $this->getAPIResponse('return', $data);
    }
}