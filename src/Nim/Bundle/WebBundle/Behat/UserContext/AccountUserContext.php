<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WebBundle\Behat\UserContext;

trait AccountUserContext
{
    /**
     * @Given /^I am on my account profile edition page$/
     */
    public function iAmOnMyAccountProfileEditionPage()
    {
        $this->iAmOnPage('fos_user_profile_show');
    }

    /**
     * @Then /^I should still be on my account profile edition page$/
     */
    public function iShouldStillBeOnMyAccountProfileEditionPage()
    {
        $this->iShouldBeOnPage('fos_user_profile_edit');
    }

    /**
     * @Then /^I should be on my account profile page$/
     */
    public function iShouldBeOnMyAccountProfilePage()
    {
        $this->iShouldBeOnPage('fos_user_profile_show');
    }

}
