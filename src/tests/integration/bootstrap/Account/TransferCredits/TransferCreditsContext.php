<?php

namespace Nextbike\Context\Account\TransferCredits;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;
use Nextbike\Api\Account\Command\TransferCreditsCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;



class TransferCreditsContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new TransferCreditsCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setCurrency($this->getIfIsset('currency', $this->updateInformation));
        $command->setAmount($this->getIfIsset('amount', $this->updateInformation));
        $command->setMobile($this->getIfIsset('mobile', $this->updateInformation));
        $command->setDescription($this->getIfIsset('description', $this->updateInformation));

        $gateway = new AccountGateway();
        $this->response = $gateway->transferCredits($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to transfer my credits to other customer acccount
     */
    public function iTryToTransferMyCreditsToOtherCustomerAcccount()
    {
        var_dump( $this->response );
    }

    /**
     * @Then I will get confirmation with any data and the credits will be transfered
     */
    public function iWillGetConfirmationWithAnyDataAndTheCreditsWillBeTransfered()
    {
        $this->assertArrayHasKey('date', $this->response['transaction']['@attributes']);
        $this->assertEquals('-1000', $this->response['transaction']['@attributes']['amount']);
        $this->assertArrayHasKey('text', $this->response['transaction']['@attributes']);
    }
}
