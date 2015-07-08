<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class GetBikeRfidUidCommand extends AbstractCommand
{

    private $rfid;

    /**
     * @return mixed
     */
    public function getRfid()
    {
        return $this->rfid;
    }

    /**
     * @param mixed $rfid
     */
    public function setRfid($rfid)
    {
        $this->rfid = $rfid;
    }


}