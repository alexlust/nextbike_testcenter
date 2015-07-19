<?php

namespace Nextbike\Context\Tests\PhoneNumber;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Tests\Gateway\TestsGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Tests\Command\PhoneNumberCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;


class PhoneNumberContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;


    /**
     * @Given The following valid information
     */
    public function theFollowingValidInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new PhoneNumberCommand();
        $command->setApikey($this->apiKey);
        $command->setMobile($this->getIfIsset('mobile', $this->updateInformation));
        $gateway = new TestsGateway();
        $this->response = $gateway->checkPhoneNumber($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to check a specified phone number for existence
     */
    public function iTryToCheckASpecifiedPhoneNumberForExistence()
    {
        var_dump($this->response);
        $this->assertEquals('491631729531', $this->response['user']['@attributes']['mobile']);
    }

    /**
     * @Then Then I will get data for existence of user with this phone number
     */
    public function iWillGetDataForExistenceOfUserWithThisPhoneNumber()
    {
        $this->assertArrayHasKey('mobile', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('lang', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['user']['@attributes']);
        $this->assertArrayHasKey('bikes', $this->response['user']['@attributes']);
    }


}
