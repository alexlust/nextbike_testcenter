<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class SetBikeRfidUidCommand extends AbstractCommand
{

    private $rfid;
    private $loginkey;
    private $bike;

    /**
     * @return mixed
     */
    public function getBike()
    {
        return $this->bike;
    }

    /**
     * @param mixed $bike
     */
    public function setBike($bike)
    {
        $this->bike = $bike;
    }

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

    /**
     * @return mixed
     */
    public function getLoginkey()
    {
        return $this->loginkey;
    }

    /**
     * @param mixed $loginkey
     */
    public function setLoginkey($loginkey)
    {
        $this->loginkey = $loginkey;
    }



}