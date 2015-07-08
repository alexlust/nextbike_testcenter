<?php

namespace Nextbike\Api\Tariffs\Gateway;
use Nextbike\Api\Tariffs\Command\SingleTariffByCodeCommand;
use Nextbike\Api\Tariffs\Command\TariffsCommand;
use Nextbike\Api\Tariffs\Command\SingleTariffCommand;
use Nextbike\Api\Tariffs\Command\RedeemVoucherCommand;


use Framework\Gateway\AbstractGateway;

class TariffsGateway extends AbstractGateway
{

    public function getTariffs(TariffsCommand $command)
    {
        $data = [
            "domain" => $command->getDomain(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('tariffs', $data);
    }


    public function getSingleTariff(SingleTariffCommand $command)
    {
        $data = [
            "uid" => $command->getUid(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('tariffs', $data);
    }

    public function getSingleTariffByCode(SingleTariffByCodeCommand $command)
    {
        $data = [
            "code" => $command->getCode(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('tariffs', $data);
    }

    public function redeemVoucher(RedeemVoucherCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "code" => $command->getCode(),
            "loginkey" => $command->getLoginkey(),
        ];

        var_dump($data);

        return $this->getAPIResponse('voucher', $data);
    }

}