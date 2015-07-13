<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class BikesAvailableToBookCommand extends AbstractCommand
{

    private $loginkey;
    private $num_bikes;
    private $place;
    private $biketypes;
    private $start_time;
    private $end_time;

    /**
     * @return mixed
     */
    public function getLoginkey()
    {
        return $this->loginkey;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * @param mixed $loginkey
     */
    public function setLoginkey($loginkey)
    {
        $this->loginkey = $loginkey;
    }

    /**
     * @return mixed
     */
    public function getNumBikes()
    {
        return $this->num_bikes;
    }

    /**
     * @param mixed $num_bikes
     */
    public function setNumBikes($num_bikes)
    {
        $this->num_bikes = $num_bikes;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getBiketypes()
    {
        return $this->biketypes;
    }

    /**
     * @param mixed $biketypes
     */
    public function setBiketypes($biketypes)
    {
        $this->biketypes = $biketypes;
    }

    /**
     * @param mixed $start_time
     */
    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;
    }

    /**
     * @param mixed $end_time
     */
    public function setEndTime($end_time)
    {
        $this->end_time = $end_time;
    }



}