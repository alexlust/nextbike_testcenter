<?php

namespace Nextbike\Context\Account\ListAccount;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Nextbike\Api\Account\Command\ListAccountCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class ListAccountContext extends BaseContext implements Context, SnippetAcceptingContext
{

    /**
     * @Given The stored loginkey
     */
    public function theStoredLoginkey()
    {
        $this->assertNotNull($this->loginKey);
    }

    /**
     * @When I try to receive the user information
     */
    public function iTryToReceiveTheUserInformation()
    {
        $command = new ListAccountCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->loginKey);

        $gateway = new AccountGateway();
        $this->response = $gateway->listAccount($command);
        $this->assertNotNull($this->response);

    }

    /**
     * @Then The API Response will have the right user information
     */
    public function theApiResponseWillHaveTheRightUserInformation()
    {
        $this->assertArrayHasKey('user', $this->response);
        $this->assertArrayHasKey('rfid_uids', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('active', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('lang', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('currency', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('credits', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('payment', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('free_seconds', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('max_bikes', $this->response['user']['@attributes']);

        $this->assertEquals($this->telefonNumber, $this->response['user']['@attributes']['mobile']);
        $this->assertEquals($this->loginKey, $this->response['user']['@attributes']['loginkey']);
    }
}