<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WebBundle\Behat\DataContext;

use Behat\Gherkin\Node\TableNode;
use Nim\Bundle\WorkerBundle\Model\Contact;
use Nim\Bundle\WorkerBundle\Model\Phone;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

trait ContactDataContext
{
    /**
     * @Given /^There are following contact:$/
     */
    public function thereAreFollowingContacts(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsContact($data['firstname'], $data['lastname'], $data);
        }
    }

    /**
     * @Given /^Contact with firstname "([^"]*)" and lastname "([^"]*)" has following emails:$/
     */
    public function contactHasFollowingEmail($firstname, $lastname, TableNode $table)
    {
        $contact = $this->getContactByName($firstname, $lastname);

        $this->entityHasEmails($table->getHash(), $contact);
    }

    /**
     * @Given /^Contact with firstname "([^"]*)" and lastname "([^"]*)" has following phones:$/
     */
    public function contactHasFollowingPhones($firstname, $lastname, TableNode $table)
    {
        $contact = $this->getContactByName($firstname, $lastname);

        $this->entityHasPhones($table->getHash(), $contact);
    }

    /**
     * @Given /^There is contact with firstname "([^"]*)" and lastname "([^"]*)""$/
     */
    public function thereIsContact($firstname, $lastname, array $additionalData = array())
    {
        /** @var Contact $contact */
        $contact = $this->getContactRepository()->createNew();
        $contact->setFirstname($firstname);
        $contact->setLastname($lastname);

        if (array_key_exists('phone type', $additionalData)
            && array_key_exists('phone number', $additionalData)) {
            $data = array(
                'type' => $additionalData['phone type'],
                'number' => $additionalData['phone number']
            );

            $this->entityHasPhones($data, $contact);

            unset($additionalData['phone type']);
            unset($additionalData['phone number']);
        }

        if (array_key_exists('email label', $additionalData)
            && array_key_exists('email address', $additionalData)) {
            $data = array(
                'label' => $additionalData['email label'],
                'address' => $additionalData['email address']
            );

            $this->entityHasEmails($data, $contact);

            unset($additionalData['email label']);
            unset($additionalData['email address']);
        }

        if (count($additionalData) > 0) {
            $this->setDataToObject($contact, $additionalData);
        }

        return$this->persistAndFlush($contact);
    }

    /**
     * @Given /^I created contact with firstname "([^"]*)" and lastname "([^"]*)"$/
     */
    public function iCreatedContact($firstname, $lastname)
    {
        $contact = $this->thereIsContact($firstname, $lastname, array(
            'firstname' => 'male',
            'lastname' => 'FR',
            'basedAt' => $this->thereIsAgency('France'),
            'street' => 'street',
            'city' => 'city',
            'postcode' => 'postcode',
            'country' => 'FR',
        ));

        $contact->addPhone(
            $this->thereIsPhone(Phone::PHONE, '0245145122')
        );
    }

    /**
     * Get contact
     *
     * @param $firstname
     * @param $lastname
     * @return Contact
     */
    private function getContactByName($firstname, $lastname)
    {
        return $this->getContactRepository()->findOneBy(array(
            'firstname' => $firstname,
            'lastname'=> $lastname
        ));
    }

    /**
     * @return EntityRepository
     */
    private function getContactRepository()
    {
        return $this->getRepository('contact');
    }
}
