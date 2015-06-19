<?php
namespace Nextbike\Api\Bike\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;

class BikeGateway extends AbstractGateway
{
    /**
     * @param GetBikeStateCommand $command
     * @return mixed
     */
    public function getBikeState(GetBikeStateCommand $command)
    {
        $data = [
            "apikey" => $command->getApiKey(),
            "loginkey" => $command->getLoginkey(),
            "bike" => $command->getBikeNumber(),
        ];

        return $this->getAPIResponse('getBikeState', $data);
    }
}