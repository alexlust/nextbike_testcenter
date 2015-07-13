<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\ActiveBookings;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\ActiveBookingsCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class ActiveBookingsContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new ActiveBookingsCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));

        $gateway = new BikeGateway();
        $this->response = $gateway->getActiveBookings($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get all bookings informations of the last :arg1 days
     */
    public function iTryToGetAllBookingsInformationsOfTheLastDays($arg1)
    {
        var_dump( $this->response );
    }

    /**
     * @Then I will get all bookings informations of the last :arg1 days
     */
    public function iWillGetAllBookingsInformationsOfTheLastDays($arg1)
    {
        $this->assertArrayHasKey('id', $this->response['booking'][0]['@attributes']);
        $this->assertEquals(94, $this->response['booking'][0]['@attributes']['place_id']);
        $this->assertArrayHasKey('lat', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('lng', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('spot', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('start_time', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('num_bikes', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('state', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('state_id', $this->response['booking'][0]['@attributes']);
        $this->assertArrayHasKey('booking_code', $this->response['booking'][0]['@attributes']);
    }


}