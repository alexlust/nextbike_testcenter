<?php

namespace Nextbike\Context\Account\ResetPin;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;
use Nextbike\Api\Account\Command\ResetPinCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;



class ResetPinContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;


    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new ResetPinCommand();
        $command->setApikey($this->apiKey);
        $command->setMobile($this->getIfIsset('mobile', $this->updateInformation));
        $gateway = new AccountGateway();
        $this->response = $gateway->resetPin($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to to reset my pin
     */
    public function iTryToToResetMyPin()
    {
        var_dump($this->response);
        $this->assertEquals('4915773967465', $this->response['user']['@attributes']['mobile']);
    }

    /**
     * @Then I will get  my account data and a sms with new pin
     */
    public function iWillGetMyAccountDataAndASmsWithNewPin()
    {
        var_dump($this->response);
        $this->assertEquals('DE', $this->response['user']['@attributes']['lang']);
        $this->assertEquals('de', $this->response['user']['@attributes']['domain']);
    }

}
