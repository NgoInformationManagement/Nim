<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\VaccineBundle\Behat;

use Behat\Gherkin\Node\TableNode;
use Nim\Bundle\VaccineBundle\Model\Vaccine;
use Nim\Component\Behat\BaseContext;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class VaccineContext extends BaseContext
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
     * @param string $title
     *
     * @return Vaccine
     */
    protected function getVaccineByTitle($title)
    {
        return $this->getVaccineRepository()->findOneBy(array('title' => $title));
    }

    /**
     * @return EntityRepository
     */
    protected function getVaccineRepository()
    {
        return $this->getRepository('vaccine');
    }

    /**
     * @param string $language
     *
     * @return string|null
     */
    protected function getLocale($language)
    {
        $locale = [
            'French' => 'fr',
            'Englis' => 'en'
        ];

        return isset($locale[$language]) ? $locale[$language] : null;
    }
}
