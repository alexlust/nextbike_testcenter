<?php

namespace Nextbike\Context\Bike\GetBikeStateContext;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Nextbike\Context\BaseContext;

class GetBikeStateContext extends BaseContext implements Context, SnippetAcceptingContext
{

    private $bikeInformation = null;

    /**
     * @Given The following valid bike information
     * @param TableNode $table
     */
    public function theFollowingValidBikeInformation(TableNode $table)
    {
        $this->bikeInformation = $this->getHashFromTable($table);
    }

    /**
     * @When I try to get the state number with the given information
     */
    public function iTryToGetTheStateNumberWithTheGivenInformation()
    {
        $command = new GetBikeStateCommand();
        $command->setApikey($this->apiKey);
        if($this->getIfIsset('bikeNumber', $this->bikeInformation) == 'DOTENV'){
            $command->setBikeNumber(getenv('BIKE_NUMBER'));
        }else{
            $command->setBikeNumber($this->getIfIsset('bikeNumber', $this->bikeInformation));
        }
        $command->setLoginkey($this->loginKey);

        $gateway = new BikeGateway();
        $this->response = $gateway->getBikeState($command);
        $this->assertNotNull($this->response);
    }

    /**
     * @Then I get the state from the bike with the given bike number
     */
    public function iGetTheStateFromTheBikeWithTheGivenBikeNumber()
    {
        var_dump( $this->response );
        $this->assertEquals(getenv('BIKE_NUMBER'), $this->response['bike']['@attributes']['number']);
        $this->assertArrayHasKey('state', $this->response['bike']['@attributes']);
        $this->assertArrayHasKey('bike_type', $this->response['bike']['@attributes']);

    }
}