<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\CancelBooking;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\CancelBookingCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class CancelBookingContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new CancelBookingCommand();
        $command->setApikey($this->apiKey);
        $command->setBookingId($this->getBookingId());

        //if($this->getIfIsset('mobile', $this->updateInformation) == 'generate_new'){
          //  $command->setMobile($this->generateTelefonNumber());
        //}

        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));

        $gateway = new BikeGateway();
        $this->response = $gateway->cancelBooking($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to cancel a running Booking
     */
    public function iTryToCancelARunningBooking()
    {
        var_dump( $this->response );
    }

    /**
     * @Then The running Booking will be canceled
     */
    public function theRunningBookingWillBeCanceled()
    {
        $this->assertArrayHasKey('id', $this->response['booking']['@attributes']);
        $this->assertEquals(1, $this->response['booking']['@attributes']['canceled']);
    }

}