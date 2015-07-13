<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Place\SetStationNumber;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Place\Gateway\PlaceGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Place\Command\SetStationNumberCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class SetStationNumberContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new SetStationNumberCommand();

        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setTerminalId($this->getIfIsset('terminal_id', $this->updateInformation));
        $command->setPlace($this->getIfIsset('place', $this->updateInformation));

        $gateway = new PlaceGateway();
        $this->response = $gateway->setStationNumber($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to connect terminal ID to station number
     */
    public function iTryToConnectTerminalIdToStationNumber()
    {
        var_dump( $this->response );
    }

    /**
     * @Then the terminal ID will be connected to station number
     */
    public function theTerminalIdWillBeConnectedToStationNumber()
    {
        $this->assertArrayHasKey('terminal_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('rack_ids', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('station_number', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('place_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('city_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('register_fields', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('rfid_card_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('partner_number_name', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('language', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('languages', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('hotline', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('website', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('city_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('place_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('api_key', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['terminal']['@attributes']);
    }

}