<?php
namespace Nextbike\Api\Bike\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;
use Nextbike\Api\Bike\Command\RentCommand;
use Nextbike\Api\Bike\Command\ReturnCommand;
use Nextbike\Api\Bike\Command\SetBikeRfidUidCommand;
use Nextbike\Api\Bike\Command\GetBikeRfidUidCommand;
use Nextbike\Api\Bike\Command\GpsTrackingCommand;
use Nextbike\Api\Bike\Command\UpdateBikeCommand;
use Nextbike\Api\Bike\Command\BikesAvailableToBookCommand;
use Nextbike\Api\Bike\Command\BookingCommand;
use Nextbike\Api\Bike\Command\ActiveBookingsCommand;
use Nextbike\Api\Bike\Command\CancelBookingCommand;

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
            "rfid"=> $command->getRfid(),
            "terminal_id"=> $command->getTerminalId()
        ];

        return $this->getAPIResponse('setBikeParameters', $data);
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

    public function updateBike(UpdateBikeCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "bike" => $command->getBike(),
            "lat" => $command->getLat(),
            "lng" => $command->getLng(),
            "comment" => $command->getComment(),
            "repair" => $command->getRepair(),
            "missed" => $command->getMissed(),
            "checked" => $command->getChecked(),
            "campaign_id" => $command->getCampaignId(),
            "place_id" => $command->getPlaceId(),
            "code_changed" => $command->getCodeChanged(),
            "code_new" => $command->getCodeNew(),
            "comment" => $command->getComment(),
        ];
        return $this->getAPIResponse('updateBike', $data);
    }

    public function getBikesAvailableToBook(BikesAvailableToBookCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "start_time" => $command->getStartTime(),
            "end_time" => $command->getEndTime(),
            "num_bikes" => $command->getNumBikes(),
            "place" => $command->getPlace(),
            "biketypes" => $command->getBiketypes()
        ];
        return $this->getAPIResponse('bikesAvailableToBook', $data);
    }


    public function booking(BookingCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "start_time" => $command->getStartTime(),
            "end_time" => $command->getEndTime(),
            "num_bikes" => $command->getNumBikes(),
            "place" => $command->getPlace(),
            "biketypes" => $command->getBiketypes()
        ];
        return $this->getAPIResponse('booking', $data);
    }

    public function getActiveBookings(ActiveBookingsCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey()
        ];
        return $this->getAPIResponse('activeBookings', $data);
    }

    public function cancelBooking(CancelBookingCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "booking_id" => $command->getBookingId()
        ];
        return $this->getAPIResponse('cancelBooking', $data);
    }

}