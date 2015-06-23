<?php

namespace Nextbike\Api\Bike\Command;

class ReturnCommand extends RentCommand{

    private $placeId;

    /**
     * @return mixed
     */
    public function getPlaceId() {
        return $this->placeId;
    }

    /**
     * @param mixed $placeId
     */
    public function setPlaceId( $placeId ) {
        $this->placeId = $placeId;
    }

}