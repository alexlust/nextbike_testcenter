<?php

namespace Nextbike\Context\Tariffs\RedeemVoucher;

use Nextbike\Api\Tariffs\Command\RedeemVoucherCommand;
use Nextbike\Api\Tariffs\Gateway\TariffsGateway;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class RedeemVoucherContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @When I try to redeem specified voucher to specified user
     */
    public function iTryToRedeemSpecifiedVoucherToSpecifiedUser(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new RedeemVoucherCommand();
        $command->setApikey($this->apiKey);
        $command->setCode($this->getIfIsset('code', $this->updateInformation));
        $command->setLoginkey($this->getIfIsset('loginkey', $this->updateInformation));
        $gateway = new TariffsGateway();
        $this->response = $gateway->redeemVoucher($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @Then I will get some information about the specified coupon and the voucher will be redeemed
     */
    public function iWillGetSomeInformationAboutTheSpecifiedCouponAndTheVoucherWillBeRedeemed()
    {
        var_dump($this->response);
        $this->assertArrayHasKey('date', $this->response['voucher']['@attributes']);
        $this->assertArrayHasKey('amount', $this->response['voucher']['@attributes']);
        $this->assertEquals('Ticket: 7d Subscription #281828', $this->response['voucher']['@attributes']['text']);
        $this->assertEquals('Das Ticket "7d Subscription" ist gültig von 15.10.2014 bis 31.12.2018.', $this->response['voucher']['@attributes']['description']);
        $this->assertEquals('281828', $this->response['voucher']['@attributes']['code']);
    }

}