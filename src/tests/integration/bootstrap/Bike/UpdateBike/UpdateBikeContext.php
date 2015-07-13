<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\UpdateBike;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\UpdateBikeCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class UpdateBikeContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new UpdateBikeCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setBike($this->getIfIsset('bike', $this->updateInformation));
        $command->setLat($this->getIfIsset('lat', $this->updateInformation));
        $command->setLng($this->getIfIsset('lng', $this->updateInformation));
        $command->setComment($this->getIfIsset('comment', $this->updateInformation));
        $command->setRepair($this->getIfIsset('repair', $this->updateInformation));
        $command->setMissed($this->getIfIsset('missed', $this->updateInformation));
        $command->setChecked($this->getIfIsset('checked', $this->updateInformation));
        $command->setCampaignId($this->getIfIsset('campaign_id', $this->updateInformation));
        $command->setPlaceId($this->getIfIsset('place_id', $this->updateInformation));
        $command->setCodeChanged($this->getIfIsset('code_changed', $this->updateInformation));
        $command->setCodeNew($this->getIfIsset('code_new', $this->updateInformation));
        $command->setComment($this->getIfIsset('comment', $this->updateInformation));


        $gateway = new BikeGateway();
        $this->response = $gateway->updateBike($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to update bike data
     */
    public function iTryToUpdateBikeData()
    {
        var_dump( $this->response );
    }

    /**
     * @Then the bike data will be updated
     */
    public function theBikeDataWillBeUpdated()
    {
        $this->assertEquals('140', $this->response['bike']['@attributes']['uid']);
        $this->assertEquals('01131', $this->response['bike']['@attributes']['bike_name']);
        $this->assertEquals(1, $this->response['bike']['@attributes']['active']);
        $this->assertEquals(1, $this->response['bike']['@attributes']['checked']);
        $this->assertEquals(42, $this->response['bike']['@attributes']['campaign_id']);
        $this->assertEquals('Theater der Welt', $this->response['bike']['@attributes']['campaign_name']);
        $this->assertEquals('1045', $this->response['bike']['@attributes']['code_new']);
        $this->assertEquals('test', $this->response['bike']['@attributes']['street2']);
        $this->assertEquals(1, $this->response['bike']['@attributes']['repair']);

        $this->assertArrayHasKey('place_id', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('signs', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('boardcomputer', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('battery', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('snap', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('target_firmware', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('electric_lock', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('gps_tracking', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('rfid', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('language', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['bike']['@attributes']);

    }

}