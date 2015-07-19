<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Place\Command;

use Framework\Command\AbstractCommand;

class SetRackIdsCommand extends AbstractCommand
{
    private $terminal_id;
    private $rack_ids;
    private $place_id;

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
    public function getRackIds()
    {
        return $this->rack_ids;
    }

    /**
     * @param mixed $rack_ids
     */
    public function setRackIds($rack_ids)
    {
        $this->rack_ids = $rack_ids;
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


}