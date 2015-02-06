<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WebBundle\Behat;

use Sylius\Bundle\ResourceBundle\Behat\FormContext;

class CollectionContext extends FormContext
{
    /**
     * @When /^I add a new phone to worker$/
     */
    public function iaddPhoneToWorker()
    {
        $this->addCollectionItem('*[@id="nim_worker_phones"]');
    }

    /**
     * @When /^I add a new email to worker$/
     */
    public function iaddEmailToWorker()
    {
        $this->addCollectionItem('*[@id="nim_worker_emails"]');
    }

    /**
     * @When /^I add a contact to worker$/
     */
    public function iaddContactToWorker()
    {
        $this->addCollectionItem('*[@id="nim_worker_contacts"]');
    }

    /**
     * @When /^I add a new email to the #(\d+) contact$/
     */
    public function iaddEmailToContact($position)
    {
        $this->addCollectionItem('*[@id="nim_worker_contacts_' . ($position - 1) . '_emails"]');
    }

    /**
     * @When /^I add a new phone to the #(\d+) contact$/
     */
    public function iaddPhoneToContact($position)
    {
        $this->addCollectionItem('*[@id="nim_worker_contacts_' . ($position - 1) . '_phones"]');
    }

    /**
     * @When /^I fill in email in the #(\d+) contact with "([^"]*)"$/
     */
    public function iFillContactEmail($position, $value)
    {
        $this->fillCollectionField(
            '*[@id="nim_worker_contacts_' . ($position - 1) . '_emails"]',
            $position,
            'address',
            $value
        );
    }

    /**
     * @When /^I fill in phone in the #(\d+) contact with "([^"]*)" and "([^"]*)"$/
     */
    public function iFillContactPhone($position, $type, $number)
    {
        $this->fillCollectionField(
            '*[@id="nim_worker_contacts_' . ($position - 1) . '_phones"]',
            $position,
            'type',
            $type
        );

        $this->fillCollectionField(
            '*[@id="nim_worker_contacts_' . ($position - 1) . '_phones"]',
            $position,
            'number',
            $number
        );
    }

    /**
     * @Then /^I should see "([^"]*)" field error in the item #(\d+) of the contact collection$/
     */
    public function iShouldSeeFieldErrorInTheItemOfTheContactCollection($field, $position)
    {
        $this->isInvalidCollectionField(
            '*[@id="nim_worker_contacts"]',
            $position,
            $field
        );
    }

    /**
     * @Given /^I fill in "([^"]*)" in the item #(\d+) of the contact collection with "([^"]*)"$/
     */
    public function iFillInInTheItemOfTheContactCollectionWith($field, $position, $value)
    {
        $this->fillCollectionField(
            '*[@id="nim_worker_contacts"]',
            $position,
            $field,
            $value
        );
    }

    /**
     * @Given /^I add a passport to worker$/
     */
    public function iAddAPassportToWorker()
    {
        $this->addCollectionItem('*[@id="nim_worker_passports"]');
    }

    /**
     * @Given /^I add a visa to worker$/
     */
    public function iAddAVisaToWorker()
    {
        $this->addCollectionItem('*[@id="nim_worker_visas"]');
    }

    /**
     * @Given /^I fill in "([^"]*)" in the item #(\d+) of the passports collection with "([^"]*)"$/
     */
    public function iFillInInTheItemOfThePassportsCollectionWith($field, $position, $value)
    {
        $this->fillCollectionField(
            '*[@id="nim_worker_passports"]',
            $position,
            $field,
            $value
        );
    }

    /**
     * @Given /^I fill in "([^"]*)" in the item #(\d+) of the visa collection with "([^"]*)"$/
     */
    public function iFillInInTheItemOfTheVisaCollectionWith($field, $position, $value)
    {
        $this->fillCollectionField(
            '*[@id="nim_worker_visas"]',
            $position,
            $field,
            $value
        );
    }

    /**
     * @Then /^I should see "([^"]*)" field error in the item #(\d+) of the passport collection$/
     */
    public function iShouldSeeFieldErrorInTheItemOfThePassportCollection($field, $position)
    {
        $this->isInvalidCollectionField(
            '*[@id="nim_worker_passports"]',
            $position,
            $field
        );
    }

    /**
     * @Then /^I should see "([^"]*)" field error in the item #(\d+) of the visa collection$/
     */
    public function iShouldSeeFieldErrorInTheItemOfTheVisaCollection($field, $position)
    {
        $this->isInvalidCollectionField(
            '*[@id="nim_worker_visas"]',
            $position,
            $field
        );
    }
}
