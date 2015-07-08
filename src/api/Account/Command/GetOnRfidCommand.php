<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Account\Command;

use Framework\Command\AbstractCommand;

class GetOnRfidCommand extends AbstractCommand
{

    private $rfid;

    public function getRfid()
    {
        return $this->rfid;
    }

    public function setRfid($rfid)
    {
        $this->rfid = $rfid;
    }


}