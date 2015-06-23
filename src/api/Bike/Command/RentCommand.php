<?php
/**
 * Created by PhpStorm.
 * User: pkroh
 * Date: 22.06.15
 * Time: 15:25
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class RentCommand extends AbstractCommand {

    private $bikeNumber;
    private $rentalId;

    /**
     * @return mixed
     */
    public function getRentalId() {
        return $this->rentalId;
    }

    /**
     * @param mixed $rentalId
     */
    public function setRentalId( $rentalId ) {
        $this->rentalId = $rentalId;
    }
    /**
     * @return mixed
     */
    public function getBikeNumber() {
        return $this->bikeNumber;
    }

    /**
     * @param mixed $bikeNumber
     */
    public function setBikeNumber( $bikeNumber ) {
        $this->bikeNumber = $bikeNumber;
    }

}