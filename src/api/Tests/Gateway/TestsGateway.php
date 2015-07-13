<?php

namespace Nextbike\Api\Tests\Gateway;
use Nextbike\Api\Tests\Command;
use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Tests\Command\PhoneNumberCommand;
use Nextbike\Api\Tests\Command\GetClosestLocationCommand;
use Nextbike\Api\Tests\Command\GetInvoicesCommand;
use Nextbike\Api\Tests\Command\GetTerminalInfoCommand;


class TestsGateway extends AbstractGateway
{


    public function checkPhoneNumber(PhoneNumberCommand $command)
    {
        $data = [
            "mobile" => $command->getMobile(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('login', $data);
    }

    public function getClosestLocation(GetClosestLocationCommand $command){
        $data = [
            "apikey" => $command->getApiKey(),
            "lat" => $command->getLat(),
            "lng" => $command->getLng()
        ];

        return $this->getAPIResponse('getLocation', $data);
    }

    public function getInvoices(GetInvoicesCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey()
        ];

        var_dump($data);

        return $this->getAPIResponse('getInvoices', $data);
    }

    public function getTerminalInfo(GetTerminalInfoCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "terminal_id" => $command->getTerminalId()
        ];

        var_dump($data);

        return $this->getAPIResponse('getTerminalInfo', $data);
    }



}