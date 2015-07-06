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
        var_dump($this->response);
    }

}