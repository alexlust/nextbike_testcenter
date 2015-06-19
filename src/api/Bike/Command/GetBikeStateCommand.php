<?php

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class GetBikeStateCommand extends AbstractCommand
{
    private $bikeNumber;



    /**
     * @return mixed
     */
    public function getBikeNumber()
    {
        return $this->bikeNumber;
    }

    /**
     * @param mixed $bikeNumber
     */
    public function setBikeNumber($bikeNumber)
    {
        $this->bikeNumber = $bikeNumber;
    }

}