<?php

namespace Nextbike\Context\Tariffs\Tariffs;

use Nextbike\Api\Tariffs\Command\TariffsCommand;
use Nextbike\Api\Tariffs\Gateway\TariffsGateway;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Account\Command\UpdateCustomerDataCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;
use Nextbike\Context\BaseContext;

class TariffsContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @When I try to get all tariffs of a specified domain
     */
    public function iTryToGetAllTariffsOfASpecifiedDomain(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new TariffsCommand();
        $command->setApikey($this->apiKey);
        $command->setDomain($this->getIfIsset('domain', $this->updateInformation));
        $gateway = new TariffsGateway();
        $this->response = $gateway->getTariffs($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @Then I will get all tariffs of a specified domain
     */
    public function iWillGetAllTariffsOfASpecifiedDomain()
    {
        var_dump($this->response);
        //TODO: check all changes;
        $this->assertEquals($this->getIfIsset('domain', $this->updateInformation), $this->response['country']['@attributes']['domain']);
        $this->assertEquals('BelfastBikes', $this->response['country']['@attributes']['name']);


        //check all tariffs
        //number 1
        $this->assertEquals('1090', $this->response['tariff'][0]['@attributes']['uid']);
        $this->assertEquals('3 day account', $this->response['tariff'][0]['@attributes']['name']);
        $this->assertEquals('bu', $this->response['tariff'][0]['@attributes']['domain']);
        $this->assertEquals('500', $this->response['tariff'][0]['@attributes']['price']);
        $this->assertEquals('GBP', $this->response['tariff'][0]['@attributes']['currency']);
        $this->assertEquals('590959', $this->response['tariff'][0]['@attributes']['code']);
        $this->assertEquals('3', $this->response['tariff'][0]['@attributes']['valid_days']);
        $this->assertEquals('The ticket "3 day account" is valid from 2015-04-01 to 2016-12-31 in Belfast.', $this->response['tariff'][0]['@attributes']['text']);

        //number 2

        $this->assertEquals('1089', $this->response['tariff'][1]['@attributes']['uid']);
        $this->assertEquals('annual account', $this->response['tariff'][1]['@attributes']['name']);
        $this->assertEquals('bu', $this->response['tariff'][1]['@attributes']['domain']);
        $this->assertEquals('2000', $this->response['tariff'][1]['@attributes']['price']);
        $this->assertEquals('GBP', $this->response['tariff'][1]['@attributes']['currency']);
        $this->assertEquals('937693', $this->response['tariff'][1]['@attributes']['code']);
        $this->assertEquals('365', $this->response['tariff'][1]['@attributes']['valid_days']);
        $this->assertEquals('The ticket "annual account" is valid from 2015-04-01 to 2016-12-31 in Belfast.', $this->response['tariff'][1]['@attributes']['text']);





    }


}