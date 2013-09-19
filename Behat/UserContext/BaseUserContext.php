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
     * @When /^I fill in "([^"]*)" with "([^"]*)" and the language "([^"]*)"$/
     */
    public function iFillInWithAndTheLanguage($field, $value, $locale)
    {
        // TODO : manage the locale
        $this->fillField($field, $value);
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
        return $this->getService('router')->generate($route, $parameters, $absolute);
    }

    /**
     * Assert that given code equals the current one.
     *
     * @param integer $code
     */
    private function assertStatusCodeEquals($code)
    {
        if (!$this->getSession()->getDriver() instanceof Selenium2Driver) {
            $this->assertSession()->statusCodeEquals($code);
        }
    }

    private function iShouldBeOnPage($page, array $parameters = array())
    {
        $this->assertSession()->addressEquals($this->generateUrl($page, $parameters));
        $this->assertStatusCodeEquals(200);
    }
}