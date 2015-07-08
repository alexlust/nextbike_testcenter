<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Account\SetCustomerRfidUid;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Account\Command\SetCustomerRfidUidCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class SetCustomerRfidUidContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new SetCustomerRfidUidCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setRfid($this->getIfIsset('rfid', $this->updateInformation));
        $gateway = new AccountGateway();
        $this->response = $gateway->setCustomerRfidUid($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to set customer RFID UID
     */
    public function iTryToSetCustomerRfidUid()
    {
        var_dump( $this->response );
        $this->assertEquals('4915773967465', $this->response['user']['@attributes']['mobile']);
    }

    /**
     * @Then the customer RFID UID will be set
     */
    public function theCustomerRfidUidWillBeSet()
    {
        var_dump( $this->response );
        $this->assertEquals('AmyeQ9FTlUoEaRzx', $this->response['user']['@attributes']['loginkey']);
        $this->assertEquals('3105877777', (in_array('3105877777', explode(',', $this->response['user']['@attributes']['rfid_uids']))?'3105877777':''));
        $this->assertEquals(1, $this->response['user']['@attributes']['active']);
        $this->assertEquals('DE', $this->response['user']['@attributes']['lang']);
        $this->assertEquals('de', $this->response['user']['@attributes']['domain']);
        $this->assertEquals('EUR', $this->response['user']['@attributes']['currency']);
    }


}