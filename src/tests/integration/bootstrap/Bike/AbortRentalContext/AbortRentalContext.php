<?php
namespace Nextbike\Context\Bike\AbortRentalContext;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Api\Bike\Command\GetBikeStateCommand;
use Nextbike\Api\Bike\Command\RentCommand;
use Nextbike\Api\Bike\Command\ReturnCommand;
use Nextbike\Api\Bike\Gateway\BikeGateway;
use Nextbike\Context\BaseContext;

class AbortRentalContext extends BaseContext implements Context, SnippetAcceptingContext {

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
     * @Then The API Response will have the right rentalId
     */
    public function theApiResponseWillHaveTheRightRentalid() {
        var_dump( $this->response );
        $this->assertNotNull( $this->response['rental']['@attributes']['id'] );
    }

    /**
     * @Given The following valid return information
     */
    public function theFollowingValidReturnInformation( TableNode $table ) {
        $this->bikeInformation = $this->getHashFromTable( $table );
        if ( $this->bikeInformation["rentalId"] == "rentalId" ) {
            $this->bikeInformation["rentalId"] = $this->response['rental']['@attributes']['id'];
        }
        if ( $this->bikeInformation["placeId"] == "placeId" ) {
            $this->bikeInformation["placeId"] = $this->response['rental']['@attributes']['start_place'];
        }
    }

    /**
     * @When I try to return
     */
    public function iTryToReturn() {
        $command = new ReturnCommand();
        $command->setApikey( $this->apiKey );
        $command->setLoginkey( $this->loginKey );
        $command->setRentalId( $this->getIfIsset( "rentalId", $this->bikeInformation ) );
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