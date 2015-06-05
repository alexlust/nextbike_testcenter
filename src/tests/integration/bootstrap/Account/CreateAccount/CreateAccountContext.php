<?php

namespace Nextbike\Context\Account\CreateAccount;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Account\Command\CreateAccountCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class CreateAccountContext extends BaseContext implements  Context, SnippetAcceptingContext
{
    private $accountInformation;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }


    /**
     * @Given The following valid user information
     * @param TableNode $table
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->accountInformation = $this->getHashFromTable($table);
    }

    /**
     * @When I try to create a new Account with the given information
     */
    public function iTryToCreateANewAccountWithTheGivenInformation()
    {
        $command = new CreateAccountCommand();
        $command->setApiKey($this->apiKey);
        $command->setEmailAddress($this->getIfIsset('e_mail', $this->accountInformation));
        $command->setTelefonNumber($this->getIfIsset('telefon_number', $this->accountInformation));

        $gateway = new AccountGateway();
        $response = $gateway->createAccount($command);

        $this->assertNotFalse($response);
    }

    /**
     * @Then The Account :arg1 will be created
     */
    public function theAccountWillBeCreated($arg1)
    {

    }
}