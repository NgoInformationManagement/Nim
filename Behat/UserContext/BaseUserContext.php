<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Behat\UserContext;

use Behat\Mink\Driver\Selenium2Driver;

trait BaseUserContext
{
    /**
     * @Given /^I am logged in as administrator$/
     */
    public function iAmLoggedInAsAdministrator()
    {
        $this->iAmLoggedInAsRole('ROLE_ADMIN');
    }

    /**
     * @Given /^I am on the dashboard page$/
     */
    public function iAmOnTheDashboardPage()
    {
        $this->getSession()->visit($this->generateUrl('nim_dashboard'));
    }

    /**
     * For example: I click (edition|deletion|detail) button near "Earthquake in Indonesia"
     *
     * @When /^I click ([^"]*) button near "([^"]*)"$/
     * @When /^I press ([^"]*) button near "([^"]*)"$/
     */
    public function iClickNear($button, $value)
    {
        $tr = $this->getSession()->getPage()->find('css',
            sprintf('table tbody tr:contains("%s")', $value)
        );

        if (null === $tr) {
            throw new ExpectationException(sprintf('Table row with value "%s" does not exist', $value), $this->getSession());
        }

        // TODO : Find an other to do that
        $locator = sprintf('button.behat-%s', $button);
        if ($tr->has('css', $locator)) {
            $tr->find('css', $locator)->press();
        } else {
            $locator = sprintf('a.behat-%s', $button);
            $tr->find('css', $locator)->click($button);
        }
    }

    /**
     * For example: I should see 10 missions in that list.
     *
     * @Then /^I should see (\d+) ([^""]*) in (that|the) list$/
     */
    public function iShouldSeeThatMuchResourcesInTheList($amount, $type)
    {
        if (1 === count($this->getSession()->getPage()->findAll('css', 'table'))) {
            $this->assertSession()->elementsCount('css', 'table tbody tr', $amount);
        } else {
            $this->assertSession()->elementsCount('css', sprintf('table#%s tbody tr', str_replace(' ', '-', $type)), $amount);
        }
    }

    /**
     * For example: I should see mission with name "Earthquake in Indonesia" in that list.
     *
     * @Then /^I should see [\w\s]+ with [\w\s]+ "([^""]*)" in (that|the) list$/
     */
    public function iShouldSeeResourceWithValueInThatList($value)
    {
        $this->assertSession()->elementTextContains('css', 'table', $value);
    }

    /**
     * For example: I should not see mission with name "Earthquake in Indonesia" in that list.
     *
     * @Then /^I should not see [\w\s]+ with [\w\s]+ "([^""]*)" in (that|the) list$/
     */
    public function iShouldNotSeeResourceWithValueInThatList($value)
    {
        $this->assertSession()->elementTextNotContains('css', 'table', $value);
    }

    /**
     * @When /^I fill in "([^"]*)" with "([^"]*)" for the language "([^"]*)"$/
     */
    public function iFillInWithAndTheLanguage($field, $value, $locale)
    {
        $tabHedear = $this->getSession()->getPage()->find('css',
            sprintf('a:contains("%s")', $locale)
        );

        $tabContainerLocator = $tabHedear->getAttribute('href');
        if ($this->isSeleniumTest()) {
            if (preg_match('/(.*)(\.a2lix_translationsFields-(.*))/',$tabContainerLocator, $matches)) {
                $tabContainerLocator = $matches['2'];
            }
        }

        $tabContainer = $this->getSession()->getPage()->find('css',
            $tabContainerLocator
        );

        $fieldElement = $tabContainer->find('named', array(
            'field', $this->getSession()->getSelectorsHandler()->xpathLiteral($field)
        ));

        $fieldElement->setValue($value);
    }

    /**
     * @Given /^I leave "([^"]*)" empty$/
     * @Given /^I leave "([^"]*)" field blank/
     */
    public function iLeaveFieldEmpty($field)
    {
        $this->getSession()->getPage()->fillField($field, '');
    }

    /**
     * @Given /^I wait (\d+)$/
     */
    public function iWait($time)
    {
        $this->getSession()->wait($time);
    }

    /**
     * @When /^I click "([^"]+)"$/
     */
    public function iClick($link)
    {
        $this->getSession()->getPage()->clickLink($link);
    }

    /**
     * @Then /^I should be on the page of ([^"]*) which has "([^"]*)" as ([^"]*)$/
     */
    public function iShouldBeOnThePageOfResource($resourceName, $value, $field)
    {
        $resource = $this->findResourceBy($resourceName, array($field => $value));

        $this->iShouldBeOnResourcePage($resource, 'show');
    }

    /**
     * @Then /^I am on the page of ([^"]*) which has "([^"]*)" as ([^"]*)$/
     */
    public function iAmOnThePageOfResource($resourceName, $value, $field)
    {
        $resource = $this->findResourceBy($resourceName, array($field => $value));

        $this->iAmOnResourcePage($resource, 'show');
    }

    /**
     * @Then /^I am updating the ([^"]*) which has "([^"]*)" as ([^"]*)$/
     */
    public function iAmUpdatingTheResource($resourceName, $value, $field)
    {
        $resource = $this->findResourceBy($resourceName, array($field => $value));

        $this->iAmOnResourcePage($resource, 'update');
    }

    /**
     * @Then /^I should be editing ([^"]*) which has "([^"]*)" as ([^"]*)$/
     */
    public function iShouldBeEditingResource($resourceName, $value, $field)
    {
        $resource = $this->findResourceBy($resourceName, array($field => $value));

        $this->iShouldBeOnResourcePage($resource, 'update');
    }

    /**
     * @Then /^I am on the ([^"]*) creation page$/
     */
    public function iAmOnTheResourceCreationPage($resourceName)
    {
        $this->iAmOnPage('nim_'.$resourceName.'_create');
    }

    /**
     * @Then /^I should be on the ([^"]*) creation page$/
     */
    public function iShouldBeOnTheResourceCreationPage($resourceName)
    {
        $this->iShouldBeOnPage('nim_'.$resourceName.'_create');
    }

    /**
     * @When /^I am on the ([^"]*) index page$/
     * @When /^I go on the ([^"]*) index page$/
     */
    public function iAmOnTheResourceIndexPage($resourceName)
    {
        $this->iAmOnPage('nim_'.$resourceName.'_index');
    }

    /**
     * @Then /^I should be on the ([^"]*) index page$/
     * @Then /^I should still be on the ([^"]*) index page$/
     */
    public function iShouldBeOnTheResourceIndexPage($resourceName)
    {
        $this->iShouldBeOnPage('nim_'.$resourceName.'_index');
    }

    /**
     * @Then /^I should see "([^"]*)" field error$/
     */
    public function iShouldSeeFieldError($field)
    {
        $this->assertSession()->elementExists('xpath', sprintf(
            "//div[contains(@class, 'error')]//label[text()[contains(., '%s')]]", ucfirst($field)
        ));
    }

    /**
     * Create user and login with given role.
     *
     * @param string $role
     */
    private function iAmLoggedInAsRole($role)
    {
        $this->thereIsUser('admin', 'password', $role);
        $this->getSession()->visit($this->generateUrl('fos_user_security_login'));

        $this->fillField('_username', 'admin');
        $this->fillField('_password', 'password');
        $this->pressButton('Login');
    }

    /**
     * Generate url.
     *
     * @param string  $route
     * @param array   $parameters
     * @param Boolean $absolute
     *
     * @return string
     */
    private function generateUrl($route, array $parameters = array(), $absolute = false)
    {
        $url = $this->getService('router')->generate($route, $parameters, $absolute);

        if ($this->isSeleniumTest()) {
            return sprintf('%s%s', $this->getMinkParameter('base_url'), $url);
        }

        return $url;
    }

    /**
     * Assert that given code equals the current one.
     *
     * @param integer $code
     */
    private function assertStatusCodeEquals($code)
    {
        if (!$this->isSeleniumTest()) {
            $this->assertSession()->statusCodeEquals($code);
        }
    }

    /**
     * Redirect the user on the $page
     *
     * @param $page
     * @param array $parameters
     */
    private function iAmOnPage($page, array $parameters = array())
    {
        $this->getSession()->visit($this->generateUrl($page, $parameters));
    }

    /**
     * Check if the use is on the page $page.
     *
     * @param $page
     * @param array $parameters
     */
    private function iShouldBeOnPage($page, array $parameters = array())
    {
        $this->assertSession()->addressEquals($this->generateUrl($page, $parameters));
        $this->assertStatusCodeEquals(200);
    }

    /**
     * Redirect the user to $action page for the $resource
     *
     * @param $resource
     * @param $action
     */
    private function iAmOnResourcePage($resource, $action)
    {
        $resourceName = $this->getResourceName($resource);

        $this->iAmOnPage(
            'nim_'.$resourceName.'_'.$action,
            array('id' => $resource->getId())
        );
    }

    /**
     * Check if the user is on the right page
     *
     * @param $resource
     * @param $action
     */
    private function iShouldBeOnResourcePage($resource, $action)
    {
        $resourceName = $this->getResourceName($resource);

        $this->iShouldBeOnPage(
            'nim_'.$resourceName.'_'.$action,
            array('id' => $resource->getId())
        );
    }

    /**
     * Check if Selenium id used
     *
     * @return string
     */
    private function isSeleniumTest()
    {
        return strstr(get_class($this->getSession()->getDriver()), 'Selenium2Driver');
    }

    /**
     * Get the resource name.
     *
     * @param $resource
     * @return string
     */
    private function getResourceName($resource)
    {
        $class = new \ReflectionClass($resource);
        return strtolower($class->getShortName());
    }
}