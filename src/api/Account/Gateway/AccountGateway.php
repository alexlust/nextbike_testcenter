<?php

namespace Nextbike\Api\Account\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Account\Command\ListAccountCommand;
use Nextbike\Api\Account\Command\LoginAccountCommand;
use Nextbike\Api\Account\Command\RegisterAccountCommand;
use Nextbike\Api\Account\Command\ResetPinCommand;
use Nextbike\Api\Account\Command\GetOnRfidCommand;
use Nextbike\Api\Account\Command\SetCustomerRfidUidCommand;
use Nextbike\Api\Tariffs\Command\TariffsCommand;
use Nextbike\Api\Account\Command\UpdateCustomerDataCommand;

class AccountGateway extends AbstractGateway
{
    /**
     * @param RegisterAccountCommand $command
     * @return mixed
     */
    public function register(RegisterAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "email" => $command->getEmailAddress(),
            "mobile" => $command->getTelefonNumber(),
            "forname" => $command->getForename(),
            "name" => $command->getName(),
            "pin" => $command->getPin()
        ];
        $response = $this->getAPIResponse( 'register', $data );
        $log=$this->getAPIResponse( "voucher", [ "apikey" => $command->getApikey(), "loginkey" =>
                $response['user']['@attributes']['loginkey'], "code" => getenv( "VOUCHER_CODE" ) ] );
        var_dump($log);
        return $response;
    }

    /**
     * @param LoginAccountCommand $command
     * @return mixed
     */
    public function login(LoginAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            'mobile' => $command->getMobile(),
            'pin' => $command->getPin()
        ];

        return $this->getAPIResponse('login', $data);
    }

    /**
     * @param ListAccountCommand $command
     * @return mixed
     */
    public function listAccount(ListAccountCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            'loginkey' => $command->getLoginkey(),
        ];

        return $this->getAPIResponse('list', $data);
    }

    public function updateCustomerData(UpdateCustomerDataCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            'loginkey' => $command->getLoginkey(),
            'mobile' => $command->getMobile(),
            'country' => $command->getCountry(),
            'zip' => $command->getZip()
        ];

        var_dump($data);

        return $this->getAPIResponse('updateCustomerData', $data);
    }

    public function resetPin(ResetPinCommand $command)
    {
        $data = [
            "mobile" => $command->getMobile(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('pinRecover', $data);
    }

    public function getOnRfid(GetOnRfidCommand $command)
    {
        $data = [
            "rfid" => $command->getRfid(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('findRfid', $data);
    }

    public function setCustomerRfidUid(SetCustomerRfidUidCommand $command)
    {
        $data = [
            "rfid" => $command->getRfid(),
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey()
        ];

        var_dump($data);

        return $this->getAPIResponse('setCustomerRfid', $data);
    }

}