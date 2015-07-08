<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class GpsTrackingCommand extends AbstractCommand
{


    private $bike;
    private $lat;
    private $lng;
    private $accuracy;
    private $comment;

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
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * @return mixed
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

    /**
     * @param mixed $accuracy
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = $accuracy;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}