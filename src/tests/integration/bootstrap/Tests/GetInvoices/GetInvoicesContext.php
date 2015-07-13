<?php

namespace Nextbike\Context\Tests\GetInvoices;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Tests\Gateway\TestsGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Tests\Command\GetInvoicesCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;


class GetInvoicesContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid information
     */
    public function theFollowingValidInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new GetInvoicesCommand();
        $command->setApikey($this->apiKey);
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $gateway = new TestsGateway();
        $this->response = $gateway->getInvoices($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get invoices of a given user
     */
    public function iTryToGetInvoicesOfAGivenUser()
    {
        var_dump($this->response);
    }

    /**
     * @Then I will get invoices of a given user
     */
    public function iWillGetInvoicesOfAGivenUser()
    {
        $this->assertArrayHasKey('number', $this->response['invoices']['invoice'][0]['@attributes']);
        $this->assertArrayHasKey('date', $this->response['invoices']['invoice'][0]['@attributes']);
        $this->assertArrayHasKey('amount_due', $this->response['invoices']['invoice'][0]['@attributes']);
        $this->assertArrayHasKey('invoice_amount', $this->response['invoices']['invoice'][0]['@attributes']);
        $this->assertArrayHasKey('payments', $this->response['invoices']['invoice'][0]['@attributes']);
        $this->assertArrayHasKey('account_carry_forward', $this->response['invoices']['invoice'][0]['@attributes']);

    }
}
