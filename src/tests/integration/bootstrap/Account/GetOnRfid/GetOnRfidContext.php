<?php

namespace Nextbike\Context\Account\GetOnRfid;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;
use Nextbike\Api\Account\Command\GetOnRfidCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;



class GetOnRfidContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;


    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new GetOnRfidCommand();
        $command->setApikey($this->apiKey);
        $command->setRfid($this->getIfIsset('rfid', $this->updateInformation));
        $gateway = new AccountGateway();
        $this->response = $gateway->getOnRfid($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get customer card or bike chip
     */
    public function iTryToGetCustomerCardOrBikeChip()
    {
        var_dump( $this->response );
        $this->assertEquals('4915773967465', $this->response['user']['@attributes']['mobile']);
    }

    /**
     * @Then I will get my account data
     */
    public function iWillGetMyAccountData()
    {
        $this->assertEquals('AmyeQ9FTlUoEaRzx', $this->response['user']['@attributes']['loginkey']);
        $this->assertEquals('3105877777', $this->response['user']['@attributes']['rfid_uids']);
        $this->assertEquals(1, $this->response['user']['@attributes']['active']);
        $this->assertEquals('DE', $this->response['user']['@attributes']['lang']);
        $this->assertEquals('de', $this->response['user']['@attributes']['domain']);
        $this->assertEquals('EUR', $this->response['user']['@attributes']['currency']);
        $this->assertEquals(0, $this->response['user']['@attributes']['free_seconds']);
        $this->assertEquals('cc', $this->response['user']['@attributes']['payment']);
        $this->assertEquals(1000, $this->response['user']['@attributes']['max_bikes']);

    }

}
