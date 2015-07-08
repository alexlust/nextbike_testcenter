<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\GetBikeRfidUid;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\GetBikeRfidUidCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class GetBikeRfidUidContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new GetBikeRfidUidCommand();
        $command->setApikey($this->apiKey);
        $command->setRfid($this->getIfIsset('rfid', $this->updateInformation));
        $gateway = new BikeGateway();
        $this->response = $gateway->getBikeRfidUid($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get bike chip with given FID UID
     */
    public function iTryToGetBikeChipWithGivenFidUid()
    {
        var_dump( $this->response );
        $this->assertEquals('04406', $this->response['bike']['@attributes']['number']);
    }

    /**
     * @Then I will get the bike chip with given RFID UID
     */
    public function iWillGetTheBikeChipWithGivenRfidUid()
    {
        $this->assertEquals('3105811111', $this->response['bike']['@attributes']['rfid']);
        $this->assertEquals('occupied', $this->response['bike']['@attributes']['state']);
    }

}