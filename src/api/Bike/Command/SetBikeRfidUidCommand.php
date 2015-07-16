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
    private $terminal_id;
    private $boardcomputer;
    private $snap;
    private $boardcomputer_version;

    /**
     * @return mixed
     */
    public function getBoardcomputer()
    {
        return $this->boardcomputer;
    }

    /**
     * @param mixed $boardcomputer
     */
    public function setBoardcomputer($boardcomputer)
    {
        $this->boardcomputer = $boardcomputer;
    }

    /**
     * @return mixed
     */
    public function getSnap()
    {
        return $this->snap;
    }

    /**
     * @param mixed $snap
     */
    public function setSnap($snap)
    {
        $this->snap = $snap;
    }

    /**
     * @return mixed
     */
    public function getBoardcomputerVersion()
    {
        return $this->boardcomputer_version;
    }

    /**
     * @param mixed $boardcomputer_version
     */
    public function setBoardcomputerVersion($boardcomputer_version)
    {
        $this->boardcomputer_version = $boardcomputer_version;
    }

    /**
     * @return mixed
     */
    public function getTerminalId()
    {
        return $this->terminal_id;
    }

    /**
     * @param mixed $terminal_id
     */
    public function setTerminalId($terminal_id)
    {
        $this->terminal_id = $terminal_id;
    }

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