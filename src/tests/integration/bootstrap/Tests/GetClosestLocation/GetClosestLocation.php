<?php

namespace Nextbike\Context\Tests\GetClosestLocation;

use Behat\Behat\Tester\Exception\PendingException;
use Nextbike\Api\Tests\Gateway\TestsGateway;
use Behat\Behat\Context\Context;
use Nextbike\Api\Tests\Command\GetClosestLocationCommand;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;


class GetClosestLocationContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;

    /**
     * @Given The following valid information
     */
    public function theFollowingValidInformation(TableNode $table)
    {
        $this->updateInformation = $this->getHashFromTable($table);

        $command = new GetClosestLocationCommand();
        $command->setApikey($this->apiKey);
        $command->setLng($this->getIfIsset('lng', $this->updateInformation));
        $command->setLat($this->getIfIsset('lat', $this->updateInformation));
        $gateway = new TestsGateway();
        $this->response = $gateway->getClosestLocation($command);

        $this->assertNotNull($this->response);
    }

    /**
     * @When I try to get the closest location
     */
    public function iTryToGetTheClosestLocation()
    {
        var_dump($this->response);#
        $this->assertArrayHasKey('lat', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('lng', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('zoom', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('name', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('hotline', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('domain', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('terms', $this->response['country']['@attributes']);
        $this->assertArrayHasKey('website', $this->response['country']['@attributes']);
    }

    /**
     * @Then I will get the closest location
     */
    public function iWillGetTheClosestLocation()
    {
        $this->assertArrayHasKey('uid', $this->response['country']['city']['@attributes']);
        $this->assertArrayHasKey('lat', $this->response['country']['city']['@attributes']);
        $this->assertArrayHasKey('lng', $this->response['country']['city']['@attributes']);
        $this->assertArrayHasKey('name', $this->response['country']['city']['@attributes']);

        $this->assertArrayHasKey('uid', $this->response['country']['city']['place']['@attributes']);
        $this->assertArrayHasKey('lat', $this->response['country']['city']['place']['@attributes']);
        $this->assertArrayHasKey('lng', $this->response['country']['city']['place']['@attributes']);
        $this->assertArrayHasKey('name', $this->response['country']['city']['place']['@attributes']);
        $this->assertArrayHasKey('spot', $this->response['country']['city']['place']['@attributes']);
        $this->assertArrayHasKey('bikes', $this->response['country']['city']['place']['@attributes']);

    }


}
