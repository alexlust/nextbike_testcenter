<?php

namespace Nextbike\Context;

use Behat\Gherkin\Node\TableNode;

class BaseContext extends \PHPUnit_Framework_TestCase
{
    protected $apiKey = null;

    protected $loginKey = null;

    public function __construct()
    {
    }

    /**
     * @Given the following base information
     * @param TableNode $table
     */
    public function theFollowingBaseInformation(TableNode $table)
    {
        $information = $this->getHashFromTable($table);

        $this->apiKey = $this->getIfIsset('apiKey', $information);
        $this->loginKey = $this->getIfIsset('loginKey', $information);
    }

    /**
     * @Given nothing
     */
    public function nothing()
    {

    }

    protected function getHashFromTable(TableNode $table)
    {
        foreach ($table->getHash() as $information) {
            return $information;
        }
        return null;
    }


    /**
     * @param $parameter
     * @param $array
     * @return mixed
     */
    protected function getIfIsset($parameter, $array)
    {
        if (isset($array[$parameter])) {
            return $array[$parameter];
        }
        return null;
    }
}