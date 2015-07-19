<?php

namespace Nextbike\Context\Tests\AddAppMessageId;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Tests\Gateway\TestsGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Tests\Command\AddAppMessageIdCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;


class AddAppMessageIdContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid information
     */
    public function theFollowingValidInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new AddAppMessageIdCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setMessageId($this->getIfIsset('message_id', $this->updateInformation));
        $command->setType($this->getIfIsset('type', $this->updateInformation));

        $gateway = new TestsGateway();
        $this->response = $gateway->addAppMessageId($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to add app messageId to a given customer
     */
    public function iTryToAddAppMessageidToAGivenCustomer()
    {
        var_dump($this->response);
    }

    /**
     * @Then Then the messageId will be added
     */
    public function thenTheMessageidWillBeAdded()
    {
        $this->assertEquals('4915773967465', $this->response['user']['@attributes']['mobile']);
        $this->assertEquals($this->getIfIsset('loginkey', $this->updateInformation), $this->response['user']['@attributes']['loginkey']);
        $this->assertArrayHasKey('rfid_uids', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('active', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('lang', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('currency', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('payment', $this->response['user']['@attributes']);
    }




}
