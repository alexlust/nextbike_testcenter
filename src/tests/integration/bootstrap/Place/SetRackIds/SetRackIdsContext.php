<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Place\SetRackIds;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Place\Gateway\PlaceGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Place\Command\SetRackIdsCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class SetRackIdsContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new SetRackIdsCommand();

        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setRackIds($this->getIfIsset('rack_ids', $this->updateInformation));
        $command->setTerminalId($this->getIfIsset('terminal_id', $this->updateInformation));
        $command->setPlaceId($this->getIfIsset('place_id', $this->updateInformation));
        $gateway = new PlaceGateway();
        $this->response = $gateway->setRackIds($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to set rack_ids
     */
    public function iTryToSetRackIds()
    {
        var_dump( $this->response );
    }

    /**
     * @Then the rack_ids will be set
     */
    public function theRackIdsWillBeSet()
    {
        $this->assertEquals($this->getIfIsset('terminal_id', $this->updateInformation), $this->response['terminal']['@attributes']['terminal_id']);
        $this->assertEquals($this->getIfIsset('rack_ids', $this->updateInformation), $this->response['terminal']['@attributes']['rack_ids']);
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
        $this->assertArrayHasKey('website', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('city_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('place_id', $this->response['terminal']['@attributes']);
        $this->assertArrayHasKey('api_key', $this->response['terminal']['@attributes']);

    }



}