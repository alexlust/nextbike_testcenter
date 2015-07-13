<?php
/**
 * Created by PhpStorm.
 * User: alust
 * Date: 06.07.15
 * Time: 21:45
 */
namespace Nextbike\Context\Team\UpdateTeamMember;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Team\Gateway\TeamGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Team\Command\UpdateTeamMemberCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class UpdateTeamMemberContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid user information
     */
    public function theFollowingValidUserInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new UpdateTeamMemberCommand();

        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $command->setMobile($this->getIfIsset('mobile', $this->updateInformation));
        $command->setTicket($this->getIfIsset('ticket', $this->updateInformation));

        $gateway = new TeamGateway();
        $this->response = $gateway->updateTeamMember($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to update a given team member
     */
    public function iTryToUpdateAGivenTeamMember()
    {
        var_dump( $this->response );
    }

    /**
     * @Then the terminal ID will be updated
     */
    public function theTerminalIdWillBeUpdated()
    {
        $this->assertArrayHasKey('name', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('default_trip_type', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('all_trips_business', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('pay_for_business_trips', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('user_cap', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('members', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('mail_domains', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('use_own_rfid_cards', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('ticket_ids', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('max_tickets', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('invoice_max_tickets', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('vat_id', $this->response['team']['@attributes']);
        $this->assertArrayHasKey('contact', $this->response['team']['@attributes']);
    }


}