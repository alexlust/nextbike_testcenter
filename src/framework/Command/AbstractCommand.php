<?php
namespace Framework\Command;

class AbstractCommand
{
    private $apikey;

    private $loginkey;

    /**
     * @return mixed
     */
    public function getApikey()
    {
        return $this->apikey;
    }

    /**
     * @param mixed $apikey
     */
    public function setApikey($apikey)
    {
        $this->apikey = $apikey;
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



