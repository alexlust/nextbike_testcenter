<?php

namespace Nextbike\Context\Account\RegisterAccount;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Account\Command\RegisterAccountCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class RegisterAccountContext extends BaseContext implements  Context, SnippetAcceptingContext
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
        $command = new RegisterAccountCommand();
        $command->setApiKey($this->apiKey);
        $command->setEmailAddress($this->getIfIsset('e_mail', $this->accountInformation));

        if($this->getIfIsset('telefon_number', $this->accountInformation) == 'generate_new'){
            $command->setTelefonNumber($this->generateTelefonNumber());
        }else {
            $this->getIfIsset('telefon_number', $this->accountInformation);
        }
        $command->setForename($this->getIfIsset('forename', $this->accountInformation));
        $command->setName($this->getIfIsset('name', $this->accountInformation));

        $gateway = new AccountGateway();
        $this->response = $gateway->register($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @Then The Account :arg1 will be created
     */
    public function theAccountWillBeCreated($arg1)
    {
        $this->assertEquals('1', $this->response['user']['@attributes']['active']);
        $this->assertNotNull($this->response['user']['@attributes']['loginkey']);
        $this->assertNotNull($this->response['user']['@attributes']['mobile']);
    }
}