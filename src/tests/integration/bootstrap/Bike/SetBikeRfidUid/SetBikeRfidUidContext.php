<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Bike\SetBikeRfidUid;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Bike\Command\SetBikeRfidUidCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class SetBikeRfidUidContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new SetBikeRfidUidCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setRfid($this->getIfIsset('rfid', $this->updateInformation));
        $command->setBike($this->getIfIsset('bike', $this->updateInformation));
        $command->setTerminalId($this->getIfIsset('terminal_id', $this->updateInformation));
        $command->setSnap($this->getIfIsset('snap', $this->updateInformation));
        $command->setBoardcomputerVersion($this->getIfIsset('boardcomputer_version', $this->updateInformation));
        $command->setBoardcomputer($this->getIfIsset('boardcomputer', $this->updateInformation));
        $gateway = new BikeGateway();
        $this->response = $gateway->setBikeRfidUid($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to set bike RFID UID
     */
    public function iTryToSetBikeRfidUid()
    {
        var_dump($this->response);
    }

    /**
     * @Then the bike RFID UID will be set
     */
    public function theBikeRfidUidWillBeSet()
    {
        $this->assertEquals($this->getIfIsset('bike', $this->updateInformation), $this->response['bike']['@attributes']['number']);
        $this->assertEquals($this->getIfIsset('boardcomputer', $this->updateInformation), $this->response['bike']['@attributes']['boardcomputer']);
        $this->assertEquals($this->getIfIsset('snap', $this->updateInformation), $this->response['bike']['@attributes']['snap']);
        $this->assertEquals('de', $this->response['bike']['@attributes']['language']);
        $this->assertEquals($this->getIfIsset('rfid', $this->updateInformation), $this->response['bike']['@attributes']['rfid']);
        $this->assertArrayHasKey('state', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('battery', $this->response['bike']['@attributes']);
    }

}