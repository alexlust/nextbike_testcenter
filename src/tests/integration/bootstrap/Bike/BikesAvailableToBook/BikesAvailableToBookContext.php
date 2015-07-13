<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\BikesAvailableToBook;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\BikesAvailableToBookCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class BikesAvailableToBookContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new BikesAvailableToBookCommand();
        $command->setApikey($this->apiKey);
        $command->setStartTime($this->getStartTime());
        $command->setEndTime($this->getEndTime());
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setNumBikes($this->getIfIsset('num_bikes', $this->updateInformation));
        $command->setPlace($this->getIfIsset('place', $this->updateInformation));
        $command->setBiketypes($this->getIfIsset('biketypes', $this->updateInformation));

        $gateway = new BikeGateway();
        $this->response = $gateway->getBikesAvailableToBook($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get a list of available bikes on a defined place
     */
    public function iTryToGetAListOfAvailableBikesOnADefinedPlace()
    {
        var_dump( $this->response );
    }

    /**
     * @Then I Ggt a list of available bikes on a defined place
     */
    public function iGgtAListOfAvailableBikesOnADefinedPlace()
    {
        $this->assertEquals(94, $this->response['availablebikes']['place']['@attributes']['uid']);
        $this->assertEquals('Purbach / Bhf', $this->response['availablebikes']['place']['@attributes']['name']);
        $this->assertArrayHasKey('available_from_selection', $this->response['availablebikes']['place']['@attributes']);
        $this->assertArrayHasKey('available', $this->response['availablebikes']['place']['@attributes']);
        $this->assertEquals('NeusiedlerSee', $this->response['availablebikes']['place']['@attributes']['city_name']);
        $this->assertEquals('3308', $this->response['availablebikes']['place']['@attributes']['station_number']);

        $this->assertArrayHasKey('typeid', $this->response['availablebikes']['place']['biketype'][0]['@attributes']);
        $this->assertArrayHasKey('type_name', $this->response['availablebikes']['place']['biketype'][0]['@attributes']);
        $this->assertArrayHasKey('available', $this->response['availablebikes']['place']['biketype'][0]['@attributes']);
    }

}