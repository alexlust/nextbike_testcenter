<?php
namespace Nextbike\Api\Bike\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;
use Nextbike\Api\Bike\Command\RentCommand;
use Nextbike\Api\Bike\Command\ReturnCommand;
use Nextbike\Api\Bike\Command\SetBikeRfidUidCommand;
use Nextbike\Api\Bike\Command\GetBikeRfidUidCommand;
use Nextbike\Api\Bike\Command\GpsTrackingCommand;

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
                "rental" => $command->getRentalId(),
                "bike" => $command->getBikeNumber(),
                "place"=> $command->getPlaceId()
        ];

        return $this->getAPIResponse('return', $data);
    }

    public function setBikeRfidUid(SetBikeRfidUidCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "bike" => $command->getBike(),
            "rfid"=> $command->getRfid()
        ];

        return $this->getAPIResponse('setBikeRfid', $data);
    }

    public function getBikeRfidUid(GetBikeRfidUidCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "rfid"=> $command->getRfid()
        ];

        return $this->getAPIResponse('findRfid', $data);
    }

    public function trackGPSBike(GpsTrackingCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "bike" => $command->getBike(),
            "lat" => $command->getLat(),
            "lng" => $command->getLng(),
            "accuracy" => $command->getAccuracy(),
            "comment" => $command->getComment(),
        ];

        return $this->getAPIResponse('tracking', $data);
    }
}