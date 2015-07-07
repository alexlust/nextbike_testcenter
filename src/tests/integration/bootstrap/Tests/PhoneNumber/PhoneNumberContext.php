<?php

namespace Nextbike\Context\Tests\PhoneNumber;

use Nextbike\Api\Tariffs\Command\TestsCommand;
use Nextbike\Api\Tariffs\Gateway\TestsGateway;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Nextbike\Context\BaseContext;

class CheckPhoneNumberContext extends BaseContext implements Context, SnippetAcceptingContext
{
    private $updateInformation;
}

