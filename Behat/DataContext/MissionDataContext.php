<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Behat\DataContext;

use Behat\Gherkin\Node\TableNode;
use Doctrine\Common\Collections\ArrayCollection;
use NIM\MissionBundle\Model\Mission;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

trait MissionDataContext
{
    /**
     * @Given /^There are following mission:$/
     */
    public function thereAreFollowingMission(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsMission($data['title'], $data);
        }
    }

    /**
     * @Given /^There is mission "([^""]*)"$/
     */
    public function thereIsMission($title, array $additionalData = array())
    {
        /** @var Mission $mission */
        $mission = $this->getMissionRepository()->createNew();
        $mission->setTitle($title);
        if (array_key_exists('startedAt', $additionalData)) {
            if (is_string($additionalData['startedAt'])) {
                $additionalData['startedAt'] = new \DateTime($additionalData['startedAt']);
            }
            $mission->setStartedAt($additionalData['startedAt']);
            unset($additionalData['startedAt']);
        }

        if (array_key_exists('endedAt', $additionalData)) {
            if (is_string($additionalData['endedAt'])) {
                $additionalData['endedAt'] = new \DateTime($additionalData['endedAt']);
            }
            $mission->setEndedAt($additionalData['endedAt']);
            unset($additionalData['endedAt']);
        }

        if (count($additionalData) > 0) {
            $this->setDataToObject($mission, $additionalData);
        }

        $this->persistAndFlush($mission);
    }

    /**
     * @Given /^Mission "([^"]*)" has following translations for "([^"]*)" language:$/
     */
    public function missionHasFollowingTranslationsForLanguageFrench($title, $language, TableNode $table)
    {
        $mission = $this->getMissionRepository()->findOneBy(array('title' => $title));

        foreach ($table->getHash() as $data) {
            $this->setDataToObject($mission, $data);
            $mission->setLocale($this->getLocale($language));
        }

        $this->persistAndFlush($mission);
    }

    /**
     * @Given /^I created mission "([^""]*)"$/
     */
    public function iCreatedMission($title)
    {
        $this->thereIsMission($title, array(
            'description' => 'description',
            'country' => 'NI',
            'startedAt' => '2006-03-06'
        ));
    }

    /**
     * @Given /^Mission "([^"]*)" has "([^"]*)" as workers$/
     */
    public function missionHasAsWorkers($title, $lastname)
    {
        /** @var Mission $mission */
        $mission = $this->getMissionRepository()->findOneBy(array('title' => $title));
        $worker = $this->getRepository('worker')->findOneBy(array('lastname' => $lastname));

        $mission->addWorker($worker);
        $this->persistAndFlush($mission);
    }

    /**
     * Get mission resource
     *
     * @param $title
     * @return Mission
     */
    private function getMissionByTitle($title)
    {
        return $this->getMissionRepository()->findOneBy(array('title' => $title));
    }

    /**
     * @return EntityRepository
     */
    private function getMissionRepository()
    {
        return $this->getRepository('mission');
    }
}
