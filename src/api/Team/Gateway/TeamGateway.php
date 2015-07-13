<?php

namespace Nextbike\Api\Team\Gateway;

use Framework\Gateway\AbstractGateway;
use Nextbike\Api\Team\Command\UpdateTeamMemberCommand;

class TeamGateway extends AbstractGateway
{
    public function updateTeamMember(UpdateTeamMemberCommand $command)
    {
        $data = [
            "ticket" => $command->getTicket(),
            "mobile" => $command->getMobile(),
            "loginkey" => $command->getLoginkey(),
            "apikey" => $command->getApiKey()
        ];

        var_dump($data);

        return $this->getAPIResponse('updateTeamMember', $data);
    }
}