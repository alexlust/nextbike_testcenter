<?php

namespace Nextbike\Context\Bike\RentContext;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;
use Nextbike\Api\Bike\Command\RentCommand;
use Nextbike\Api\Bike\Command\ReturnCommand;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Nextbike\Context\BaseContext;

class RentContext extends BaseContext implements Context, SnippetAcceptingContext {

    private $bikeInformation;

    /**
     * @Given The following valid bike information
     */
    public function theFollowingValidBikeInformation( TableNode $table ) {
        $this->bikeInformation = $this->getHashFromTable( $table );
        if ( $this->bikeInformation["bikeNumber"] == "TestBike" ) {
            $this->bikeInformation["bikeNumber"] = $this->getBikeNumber();
        }
    }

    /**
     * @When I try to rent
     */
    public function iTryToRent() {
        $command = new RentCommand();
        $command->setApikey( $this->apiKey );
        $command->setLoginkey( $this->loginKey );
        $command->setBikeNumber( $this->getIfIsset( "bikeNumber", $this->bikeInformation ) );

        $gateway = new BikeGateway();
        $this->response = $gateway->rent( $command );
    }

    /**
     * @Then The API Response will have the right lock code
     */
    public function theApiResponseWillHaveTheRightLockCode() {
        var_dump( $this->response );
        $this->assertNotNull( $this->response['rental']['@attributes']['code'] );
    }

    /**
     * @Given The following valid return information
     */
    public function theFollowingValidReturnInformation( TableNode $table ) {
        $this->bikeInformation = $this->getHashFromTable( $table );
        if ( $this->bikeInformation["bikeNumber"] == "TestBike" ) {
            $this->bikeInformation["bikeNumber"] = $this->getBikeNumber();
        }
        if ( $this->bikeInformation["placeId"] == "TestStation" ) {
            $this->bikeInformation["placeId"] = $this->getPlaceId();
        }
    }

    /**
     * @When I try to return
     */
    public function iTryToReturn() {
        $command = new ReturnCommand();
        $command->setApikey( $this->apiKey );
        $command->setLoginkey( $this->loginKey );
        $command->setBikeNumber( $this->getIfIsset( "bikeNumber", $this->bikeInformation ) );
        $command->setPlaceId( $this->getIfIsset( "placeId", $this->bikeInformation ) );

        $gateway = new BikeGateway();
        $this->response = $gateway->returnBike( $command );
    }

    /**
     * @Then The Bike will be returned
     */
    public function theBikeWillBeReturned() {
        var_dump( $this->response );
        $this->assertNotNull( $this->response['rental']['@attributes']['code'] );
    }

}