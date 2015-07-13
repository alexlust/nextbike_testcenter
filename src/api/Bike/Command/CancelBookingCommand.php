<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class CancelBookingCommand extends AbstractCommand
{
    private $loginkey;
    private $booking_id;

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

    /**
     * @return mixed
     */
    public function getBookingId()
    {
        return $this->booking_id;
    }

    /**
     * @param mixed $booking_id
     */
    public function setBookingId($booking_id)
    {
        $this->booking_id = $booking_id;
    }


}