<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Bike\Command;

use Framework\Command\AbstractCommand;

class UpdateBikeCommand extends AbstractCommand
{

    private $loginkey;
    private $bike;
    private $lat;
    private $lng;
    private $comment;
    private $repair;
    private $missed;
    private $checked;
    private $campaign_id;
    private $place_id;
    private $code_changed;
    private $code_new;

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

    /**
     * @return mixed
     */
    public function getRepair()
    {
        return $this->repair;
    }

    /**
     * @param mixed $repair
     */
    public function setRepair($repair)
    {
        $this->repair = $repair;
    }

    /**
     * @return mixed
     */
    public function getMissed()
    {
        return $this->missed;
    }

    /**
     * @param mixed $missed
     */
    public function setMissed($missed)
    {
        $this->missed = $missed;
    }

    /**
     * @return mixed
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * @param mixed $checked
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @param mixed $campaign_id
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return mixed
     */
    public function getPlaceId()
    {
        return $this->place_id;
    }

    /**
     * @param mixed $place_id
     */
    public function setPlaceId($place_id)
    {
        $this->place_id = $place_id;
    }

    /**
     * @return mixed
     */
    public function getCodeChanged()
    {
        return $this->code_changed;
    }

    /**
     * @param mixed $code_changed
     */
    public function setCodeChanged($code_changed)
    {
        $this->code_changed = $code_changed;
    }

    /**
     * @return mixed
     */
    public function getCodeNew()
    {
        return $this->code_new;
    }

    /**
     * @param mixed $code_new
     */
    public function setCodeNew($code_new)
    {
        $this->code_new = $code_new;
    }
}