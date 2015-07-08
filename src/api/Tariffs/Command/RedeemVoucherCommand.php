<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 19.06.15
 * Time: 18:53
 */

namespace Nextbike\Api\Tariffs\Command;

use Framework\Command\AbstractCommand;

class RedeemVoucherCommand extends AbstractCommand
{

    private $code;
    private $loginkey;

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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

}