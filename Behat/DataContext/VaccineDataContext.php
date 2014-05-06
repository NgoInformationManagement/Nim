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
use NIM\VaccineBundle\Model\Vaccine;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

trait VaccineDataContext
{
    /**
     * @Given /^There are following vaccine:$/
     */
    public function thereAreFollowingVaccine(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsVaccine($data['title'], $data);
        }
    }

    /**
     * @Given /^There is vaccine "([^""]*)"$/
     */
    public function thereIsVaccine($title, array $additionalData = array())
    {
        /** @var Vaccine $vaccine */
        $vaccine = $this->getVaccineRepository()->createNew();
        $vaccine->setTitle($title);

        if (count($additionalData) > 0) {
            $this->setDataToObject($vaccine, $additionalData);
        }

        $this->persistAndFlush($vaccine);
    }

    /**
     * @Given /^Vaccine "([^"]*)" has following translations for "([^"]*)" language:$/
     */
    public function vaccineHasFollowingTranslationsForLanguageFrench($title, $language, TableNode $table)
    {
        $vaccine = $this->getVaccineRepository()->findOneBy(array('title' => $title));

        foreach ($table->getHash() as $data) {
            $this->setDataToObject($vaccine, $data);
            $vaccine->setLocale($this->getLocale($language));
        }

        $this->persistAndFlush($vaccine);
    }

    /**
     * @Given /^I created vaccine "([^""]*)"$/
     */
    public function iCreatedVaccine($title)
    {
        $this->thereIsVaccine($title, array(
            'description' => 'description',
        ));
    }

    /**
     * @Given /^Vaccine "([^"]*)" has "([^"]*)" as workers$/
     */
    public function vaccineHasAsWorkers($title, $lastname)
    {
        /** @var Vaccine $vaccine */
        $vaccine = $this->getVaccineRepository()->findOneBy(array('title' => $title));
        $worker = $this->getRepository('worker')->findOneBy(array('lastname' => $lastname));

        $vaccine->addWorkers($worker);
        $this->persistAndFlush($vaccine);
    }

    /**
     * Get vaccine resource
     *
     * @param $title
     * @return Vaccine
     */
    private function getVaccineByTitle($title)
    {
        return $this->getVaccineRepository()->findOneBy(array('title' => $title));
    }

    /**
     * @return EntityRepository
     */
    private function getVaccineRepository()
    {
        return $this->getRepository('vaccine');
    }
}
