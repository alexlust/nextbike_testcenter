<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\Booking;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\BookingCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class BookingContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new BookingCommand();
        $command->setApikey($this->apiKey);
        $command->setStartTime($this->getStartTime());
        $command->setEndTime($this->getEndTime());
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setNumBikes($this->getIfIsset('num_bikes', $this->updateInformation));
        $command->setPlace($this->getIfIsset('place', $this->updateInformation));
        $command->setBiketypes($this->getIfIsset('biketypes', $this->updateInformation));

        $gateway = new BikeGateway();
        $this->response = $gateway->booking($command);
        $this->assertNotNull($this->response);
        $this->saveBookingId($this->response['booking']['@attributes']['id']);
    }

    /**
     * @When I try to book a defined numbers of bikes on a defined place
     */
    public function iTryToBookADefinedNumbersOfBikesOnADefinedPlace()
    {
        var_dump( $this->response );
    }

    /**
     * @Then the defined numbers of bikes will be booked
     */
    public function theDefinedNumbersOfBikesWillBeBooked()
    {
        $this->assertArrayHasKey('id', $this->response['booking']['@attributes']);
        $this->assertEquals(94, $this->response['booking']['@attributes']['place_id']);
        $this->assertEquals('Purbach / Bhf', $this->response['booking']['@attributes']['place_name']);
        $this->assertArrayHasKey('start_time', $this->response['booking']['@attributes']);
        $this->assertArrayHasKey('booked', $this->response['booking']['@attributes']);
        $this->assertArrayHasKey('booking_code', $this->response['booking']['@attributes']);
        $this->assertArrayHasKey('confirm', $this->response['booking']['@attributes']);
    }

}