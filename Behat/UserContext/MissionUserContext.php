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

trait MissionUserContext
{
    /**
     * @When /^I am on the mission index page$/
     * @When /^I go on the mission index page$/
     */
    public function iAmOnTheMissionIndexPage()
    {
        $this->getSession()->visit($this->generateUrl('nim_mission_index'));
    }

    /**
     * @Then /^I should be on the mission index page$/
     * @Then /^I should still be on the mission index page$/
     */
    public function iShouldBeOnTheMissionIndexPage()
    {
        $this->iShouldBeOnPage('nim_mission_index');
    }

    /**
     * @Given /^I am on the mission creation page$/
     */
    public function iAmOnTheMissionCreationPage()
    {
        $this->getSession()->visit($this->generateUrl('nim_mission_create'));
    }

    /**
     * @Then /^I should be on the mission creation page$/
     */
    public function iShouldBeOnTheMissionCreationPage()
    {
        $this->iShouldBeOnPage('nim_mission_create');
    }

    /**
     * @Then /^I should be editing mission "([^"]*)"$/
     */
    public function iShouldBeEditingMission($title)
    {
        $mission = $this->getMissionByTitle($title);
        $this->iShouldBeOnPage('nim_mission_update', array('id' => $mission->getId()));
    }

    /**
     * @Given /^I am updating the mission "([^"]*)"$/
     */
    public function iAmUpdatingTheMission($title)
    {
        $this->iAmOnThePageOfMission($title);
    }

    /**
     * @Given /^I am on the page of mission "([^"]*)"$/
     */
    public function iAmOnThePageOfMission($title)
    {
        $mission = $this->getMissionByTitle($title);
        $this->getSession()->visit(
            $this->generateUrl(
                'nim_mission_show', array('id' => $mission->getId())
            )
        );
    }

    /**
     * @Then /^I should be on the page of mission "([^"]*)"$/
     */
    public function iShouldBeOnThePageOfMission($title)
    {
        $mission = $this->getMissionByTitle($title);
        $this->iShouldBeOnPage('nim_mission_show', array('id' => $mission->getId()));
    }
}