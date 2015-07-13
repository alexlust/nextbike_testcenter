<?php

namespace Nextbike\Context\Tests\GetTerminalInfo;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Tests\Gateway\TestsGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Tests\Command\GetInvoicesCommand;
use Nextbike\Api\Tests\Command\GetTerminalInfoCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;


class GetTerminalInfoContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid information
     */
    public function theFollowingValidInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new GetTerminalInfoCommand();
        $command->setApikey($this->apiKey);
        $command->setTerminalId($this->getIfIsset('terminal_id', $this->updateInformation));
        $gateway = new TestsGateway();
        $this->response = $gateway->getTerminalInfo($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get information of a given terminal
     */
    public function iTryToGetInformationOfAGivenTerminal()
    {
        var_dump($this->response);
    }

    /**
     * @Then I will get information of a given terminal
     */
    public function iWillGetInformationOfAGivenTerminal()
    {
        $this->assertArrayHasKey('terminal_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('rack_ids', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('station_number', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('place_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('city_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('firmware', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('register_fields', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('rfid_card_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('partner_number_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('language', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('languages', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('hotline', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('mobile_prefix', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('website', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('city_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('place_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('api_key', $this->response['terminal']['@attributes']);
    }

}
