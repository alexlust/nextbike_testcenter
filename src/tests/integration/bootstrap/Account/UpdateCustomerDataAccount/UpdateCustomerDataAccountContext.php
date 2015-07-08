<?php

namespace Nextbike\Context\Account\UpdateCustomerDataAccount;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Account\Command\UpdateCustomerDataCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class UpdateCustomerDataAccountContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The stored loginkey
     */
    public function theStoredLoginkey()
    {
       $this->assertNotNull($this->loginKey);
    }

    /**
     * @When I try to change my account with the following information
     */
    public function iTryToChangeMyAccountWithTheFollowingInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new UpdateCustomerDataCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->loginKey);

        if($this->getIfIsset('mobile', $this->updateInformation) == 'generate_new'){
            $command->setMobile($this->generateTelefonNumber());
        }

        $command->setZip($this->getIfIsset('zip', $this->updateInformation));
        $command->setCountry($this->getIfIsset('country', $this->updateInformation));
        $gateway = new AccountGateway();
        $this->response = $gateway->updateCustomerData($command);

        $this->assertNotNull($this->response);

    }

    /**
     * @Then The API Response will have the right updated user information
     */
    public function theApiResponseWillHaveTheRightUpdatedUserInformation()
    {
        var_dump($this->response);
        //TODO: //TODO: check all changes;
        $this->assertArrayHasKey('user', $this->response);
        $this->assertArrayHasKey('mobile', $this->response['user']['@attributes']);
        $this->assertEquals($this->telefonNumber, $this->response['user']['@attributes']['mobile']);
        $this->assertEquals($this->loginKey, $this->response['user']['@attributes']['loginkey']);
    }
}