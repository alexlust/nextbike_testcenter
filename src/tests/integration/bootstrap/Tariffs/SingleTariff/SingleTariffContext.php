<?php

namespace Nextbike\Context\Tariffs\SingleTariff;

use Nextbike\Api\Tariffs\Command\SingleTariffCommand;
use Nextbike\Api\Tariffs\Gateway\TariffsGateway;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class SingleTariffContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;
    /**
     * @When I try to get one tariff of a specified uid
     */
    public function iTryToGetOneTariffOfASpecifiedUid(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new SingleTariffCommand();
        $command->setApikey($this->apiKey);
        $command->setUid($this->getIfIsset('uid', $this->updateInformation));
        $gateway = new TariffsGateway();
        $this->response = $gateway->getSingleTariff($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @Then I will get one tariff of a specified uid
     */
    public function iWillGetOneTariffOfASpecifiedUid()
    {
        var_dump($this->response);
        //TODO: check all changes;
        $this->assertEquals($this->getIfIsset('uid', $this->updateInformation), $this->response['tariff']['@attributes']['uid']);
        $this->assertEquals('3 day account', $this->response['tariff']['@attributes']['name']);
        $this->assertEquals('bu', $this->response['tariff']['@attributes']['domain']);
        $this->assertEquals('500', $this->response['tariff']['@attributes']['price']);
        $this->assertEquals('GBP', $this->response['tariff']['@attributes']['currency']);
        $this->assertEquals('590959', $this->response['tariff']['@attributes']['code']);
        $this->assertEquals('3', $this->response['tariff']['@attributes']['valid_days']);
        $this->assertEquals('The ticket "3 day account" is valid from 2015-04-01 to 2016-12-31 in Belfast.', $this->response['tariff']['@attributes']['text']);

    }




}