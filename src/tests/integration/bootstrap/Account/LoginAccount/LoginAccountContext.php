<?php
namespace Nextbike\Context\Account\LoginAccount;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Account\Command\LoginAccountCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class LoginAccountContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $userInformation;

    /**
     * @Given The following valid user information
     * @param TableNode $table
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->userInformation = $this->getHashFromTable($table);
    }

    /**
     * @When I try to login
     */
    public function iTryToLogin()
    {
        $command = new LoginAccountCommand();
        $command->setMobile($this->telefonNumber);
        $command->setApikey($this->apiKey);
        $command->setPin($this->userInformation['pin']);

        $gateway = new AccountGateway();
        $this->response = $gateway->login($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @Then The API Response will have the right login key
     */
    public function theApiResponseWillHaveTheRightLoginKey()
    {
        $this->assertEquals($this->telefonNumber, $this->response['user']['@attributes']['mobile']);
        $this->assertEquals($this->loginKey, $this->response['user']['@attributes']['loginkey']);

    }
}