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