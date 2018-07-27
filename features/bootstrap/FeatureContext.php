<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given there are :arg1 blog posts
     */
    public function thereAreBlogPosts($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I click :arg1
     */
    public function iClick($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see :arg1 blog posts
     */
    public function iShouldSeeBlogPosts($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I fill in :arg1  with :arg2
     */
    public function iFillInWith($arg1, $arg2)
    {
        throw new PendingException();
    }

}
