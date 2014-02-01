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

use NIM\FormBundle\Behat\CollectionContext as BaseContext;

class CollectionContext extends BaseContext
{
    /**
     * @When /^(?:|I )add a new phone to worker$/
     */
    public function iaddPhoneToWorker()
    {
        $this->addItem('*[@id="nim_worker_phones"]');
    }

    /**
     * @When /^(?:|I )add a new email to worker$/
     */
    public function iaddEmailToWorker()
    {
        $this->addItem('*[@id="nim_worker_emails"]');
    }

    /**
     * @When /^(?:|I )add a contact to worker$/
     */
    public function iaddContactToWorker()
    {
        $this->addItem('*[@id="nim_worker_contacts"]');
    }

    /**
     * @When /^(?:|I )add a new email to the #(\d+) contact$/
     */
    public function iaddEmailToContact($position)
    {
        $this->addItem('*[@id="nim_worker_contacts_' . ($position - 1) . '_emails"]');
    }

    /**
     * @When /^(?:|I )add a new phone to the #(\d+) contact$/
     */
    public function iaddPhoneToContact($position)
    {
        $this->addItem('*[@id="nim_worker_contacts_' . ($position - 1) . '_phones"]');
    }

    /**
     * Example : I fill in email in the #1 contact with "arnaud@exemple.com"
     *
     * @When /^(?:|I )fill in email in the #(\d+) contact with "([^"]*)"$/
     */
    public function iFillContactEmail($position, $value)
    {
        $this->fillField(
            '*[@id="nim_worker_contacts_' . ($position - 1) . '_emails"]',
            $position,
            'address',
            $value,
            false
        );
    }

    /**
     * Example : I fill in phone in the #1 contact with "fax" and "0556983423"
     *
     * @When /^(?:|I )fill in phone in the #(\d+) contact with "([^"]*)" and "([^"]*)"$/
     */
    public function iFillContactPhone($position , $type, $number)
    {
        $this->fillField(
            '*[@id="nim_worker_contacts_' . ($position - 1) . '_phones"]',
            $position,
            'type',
            $type,
            false
        );

        $this->fillField(
            '*[@id="nim_worker_contacts_' . ($position - 1) . '_phones"]',
            $position,
            'number',
            $number,
            false
        );
    }

}
