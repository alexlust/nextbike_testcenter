<?php

namespace Nextbike\Context;

use Behat\Gherkin\Node\TableNode;
use Dotenv\Dotenv;
use Nextbike\Api\Account\Command\RegisterAccountCommand;
use Nextbike\Api\Account\Gateway\AccountGateway;


class BaseContext extends \PHPUnit_Framework_TestCase
{
    protected $apiKey = null;

    protected $loginKey = null;

    protected $response = null;

    protected $telefonNumber = null;

    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__ . '/../../../../');
        $dotenv->load();
    }

    /**
     * @Given the following base information
     * @param TableNode $table
     */
    public function theFollowingBaseInformation(TableNode $table)
    {
        $information = $this->getHashFromTable($table);

        $this->apiKey = $this->getIfIsset('apikey', $information);
        $this->loginKey = $this->getIfIsset('loginKey', $information);
    }

    /**
     * @Given A user with the following information
     * @param TableNode $table
     */
    public function aUserWithTheFollowingInformation(TableNode $table)
    {
        $userInformation = $this->getHashFromTable($table);
        $command = new RegisterAccountCommand();
        $command->setApiKey($this->apiKey);
        $command->setEmailAddress($this->getIfIsset('e_mail', $userInformation));

        if($this->getIfIsset('telefon_number', $userInformation) == 'generate_new'){
            $command->setTelefonNumber($this->generateTelefonNumber());
        }else {
            $this->getIfIsset('telefon_number', $userInformation);
        }
        $command->setForename($this->getIfIsset('forename', $userInformation));
        $command->setName($this->getIfIsset('name', $userInformation));
        $command->setPin($this->getIfIsset('pin', $userInformation));

        $gateway = new AccountGateway();
        $this->response = $gateway->register($command);
        $this->loginKey = $this->response['user']['@attributes']['loginkey'];

        $this->assertNotNull($this->response);
    }

    public function generateTelefonNumber()
    {
        $randomNumber = rand(19999999999999, 99999999999999);
        $this->telefonNumber = '+49' . $randomNumber;
        return $this->telefonNumber;
    }

    protected function getHashFromTable(TableNode $table)
    {
        foreach ($table->getHash() as $information) {
            return $information;
        }
        return null;
    }

    protected function getIfIsset($parameter, $array)
    {
        if (isset($array[$parameter])) {
            return $array[$parameter];
        }
        return null;
    }

    protected function getBikeNumber(){
        return getenv("BIKE_NUMBER");
    }

    protected function getPlaceId(){
        return getenv("PLACE_ID");
    }

    protected function getStartTime(){
        return time()+50000;
    }

    protected function saveBookingId($BookingId){
        //putenv("BOOKING_ID=$BookingId");
        $file = __DIR__ .'/../../../../.env';

        file_put_contents($file,preg_replace('^BOOKING_ID = [0-9]{4}^','',file_get_contents($file)));



        // if(preg_match("/String/",$string))

        $current = file_get_contents($file);
        $current .= "\n"."BOOKING_ID = ".$BookingId."\n";
        file_put_contents($file, $current);

    }

    protected function getBookingId(){
        echo'!!!!!'.getenv("BOOKING_ID");
        return getenv("BOOKING_ID");
    }
    protected function getEndTime(){
        return time()+1000000;
    }


}