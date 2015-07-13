<?php

namespace Nextbike\Context\Account\UpdateUser;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Account\Command\UpdateUserCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class UpdateUserContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @When I try to change my account with the following information
     */
    public function iTryToChangeMyAccountWithTheFollowingInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new UpdateUserCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setMobile($this->getIfIsset('mobile', $this->updateInformation));
        $command->setCountry($this->getIfIsset('country', $this->updateInformation));
        $command->setZip($this->getIfIsset('zip', $this->updateInformation));
        $command->setEmail($this->getIfIsset('email', $this->updateInformation));
        $command->setForename($this->getIfIsset('forename', $this->updateInformation));
        $command->setName($this->getIfIsset('name', $this->updateInformation));
        $command->setAddress($this->getIfIsset('address', $this->updateInformation));
        $command->setCity($this->getIfIsset('city', $this->updateInformation));
        $command->setLanguage($this->getIfIsset('language', $this->updateInformation));
        $command->setPayment($this->getIfIsset('payment', $this->updateInformation));
        $command->setIban($this->getIfIsset('iban', $this->updateInformation));
        $command->setBic($this->getIfIsset('bic', $this->updateInformation));
        $command->setNewsletter($this->getIfIsset('newsletter', $this->updateInformation));

        $gateway = new AccountGateway();
        $this->response = $gateway->updateUser($command);

        $this->assertNotNull($this->response);

    }

    /**
     * @Then The API Response will have the rlust@nextbike.deight updated user information
     */
    public function theApiResponseWillHaveTheRlustNextbikeDeightUpdatedUserInformation()
    {
        var_dump($this->response);
        $this->assertEquals('4915773967465', $this->response['user']['@attributes']['mobile']);
        $this->assertEquals('lust@nextbike.de', $this->response['user']['@attributes']['email']);
        $this->assertEquals('Alexander', $this->response['user']['@attributes']['forename']);
        $this->assertEquals('Lust', $this->response['user']['@attributes']['name']);
        $this->assertEquals('01477', $this->response['user']['@attributes']['zip']);
        $this->assertEquals('Teststraße 2', $this->response['user']['@attributes']['address']);
        $this->assertEquals('DE', $this->response['user']['@attributes']['country']);
        $this->assertEquals('cc', $this->response['user']['@attributes']['payment']);
        $this->assertEquals('123321', $this->response['user']['@attributes']['iban']);
        $this->assertEquals('3254876', $this->response['user']['@attributes']['bic']);
        $this->assertEquals('DE', $this->response['user']['@attributes']['language']);
        $this->assertEquals(0, $this->response['user']['@attributes']['newsletter']);
    }

}