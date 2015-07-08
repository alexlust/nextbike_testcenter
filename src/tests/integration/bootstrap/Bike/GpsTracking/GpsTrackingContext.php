<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\GpsTracking;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\GpsTrackingCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class GpsTrackingContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new GpsTrackingCommand();
        $command->setApikey($this->apiKey);
        $command->setBike($this->getIfIsset('bike', $this->updateInformation));
        $command->setLat($this->getIfIsset('lat', $this->updateInformation));
        $command->setLng($this->getIfIsset('lng', $this->updateInformation));
        $command->setAccuracy($this->getIfIsset('accuracy', $this->updateInformation));
        $command->setComment($this->getIfIsset('comment', $this->updateInformation));

        $gateway = new BikeGateway();
        $this->response = $gateway->trackGPSBike($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to track a bike
     */
    public function iTryToTrackABike()
    {
        var_dump($this->response);
    }

    /**
     * @Then the bike will be tracked
     */
    public function theBikeWillBeTracked()
    {
        $this->assertEquals('captured', $this->response['tracking']['@attributes']['state']);
    }

}