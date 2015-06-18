<?php


namespace Nextbike\Api\Account\Command;


use Framework\Command\AbstractCommand;

class LoginAccountCommand extends AbstractCommand
{
    private $mobile;

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }


}