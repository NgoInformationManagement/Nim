<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Behat;

use Behat\Gherkin\Node\TableNode;
use Nim\Bundle\WorkerBundle\Model\Agency;
use Nim\Bundle\WorkerBundle\Model\Contact;
use Nim\Bundle\WorkerBundle\Model\Contactable\PhoneTypes;
use Nim\Bundle\WorkerBundle\Model\Email;
use Nim\Bundle\WorkerBundle\Model\Phone;
use Nim\Bundle\WorkerBundle\Model\Worker;
use Nim\Component\Behat\BaseContext;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class WorkerContext extends BaseContext
{
    /**
     * @param array  $phones
     * @param object $entity
     *
     * @return object
     */
    public function entityHasPhones(array $phones, $entity)
    {
        foreach ($phones as $number) {
            $phone = $this->thereIsPhone($number['type'], $number['number']);
            $entity->addPhone($phone);
        }

        return $this->persistAndFlush($entity);
    }

    /**
     * @param string $type
     * @param string $number
     *
     * @return Phone
     */
    public function thereIsPhone($type, $number)
    {
        $phone = new Phone();
        $this->setDataToObject($phone, array(
            'type' => $type,
            'number' => $number,
        ));

        return $this->persistAndFlush($phone);
    }

    /**
     * @param array  $emails
     * @param string $entity
     *
     * @return object
     */
    public function entityHasEmails(array $emails, $entity)
    {
        foreach ($emails as $address) {
            $phone = $this->thereIsEmail($address['address']);
            $entity->addEmail($phone);
        }

        return $this->persistAndFlush($entity);
    }

    /**
     * @param string $address
     *
     * @return object
     */
    public function thereIsEmail($address)
    {
        $email = new Email();
        $this->setDataToObject($email, array(
            'address' => $address,
        ));

        return $this->persistAndFlush($email);
    }

    /**
     * @Given /^There are following workers:$/
     */
    public function thereAreFollowingWorkers(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsWorker($data['firstname'], $data['lastname'], $data);
        }
    }

    /**
     * @Given /^Worker with firstname "([^"]*)" and lastname "([^"]*)" has following emails:$/
     */
    public function workerHasFollowingEmail($firstname, $lastname, TableNode $table)
    {
        $worker = $this->getWorkerByName($firstname, $lastname);

        $this->entityHasEmails($table->getHash(), $worker);
    }

    /**
     * @Given /^Worker with firstname "([^"]*)" and lastname "([^"]*)" has following phones:$/
     */
    public function workerHasFollowingPhones($firstname, $lastname, TableNode $table)
    {
        $worker = $this->getWorkerByName($firstname, $lastname);

        $this->entityHasPhones($table->getHash(), $worker);
    }

    /**
     * @Given /^Worker with firstname "([^"]*)" and lastname "([^"]*)" has following contacts:$/
     */
    public function workerHasFollowingContact($firstname, $lastname, TableNode $table)
    {
        $worker = $this->getWorkerByName($firstname, $lastname);

        foreach ($table->getHash() as $data) {
            $contact = $this->thereIsContact($data['firstname'], $data['lastname'], $data);
            $worker->addContact($contact);
        }

        return $this->persistAndFlush($worker);
    }

    /**
     * @Given /^There is worker with firstname "([^"]*)" and lastname "([^"]*)""$/
     */
    public function thereIsWorker($firstname, $lastname, array $additionalData = array())
    {
        /** @var Worker $worker */
        $worker = $this->getWorkerRepository()->createNew();
        $worker->setFirstname($firstname);
        $worker->setLastname($lastname);

        if (array_key_exists('agency', $additionalData)) {
            $agency = $this->thereIsAgency($additionalData['agency']);
            $worker->setBasedAt($agency);
            unset($additionalData['agency']);
        }

        if (array_key_exists('birthday', $additionalData)) {
            if (is_string($additionalData['birthday'])) {
                $additionalData['birthday'] = new \DateTime($additionalData['birthday']);
            }
            $worker->setBirthday($additionalData['birthday']);
            unset($additionalData['birthday']);
        }

        if (array_key_exists('arrivedAt', $additionalData)) {
            if (is_string($additionalData['arrivedAt'])) {
                $additionalData['arrivedAt'] = new \DateTime($additionalData['arrivedAt']);
            }
            $worker->setArrivedAt($additionalData['arrivedAt']);
            unset($additionalData['arrivedAt']);
        }

        if (count($additionalData) > 0) {
            $this->setDataToObject($worker, $additionalData);
        }

        return $this->persistAndFlush($worker);
    }

    /**
     * @Given /^I created worker which has "([^"]*)" "([^"]*)" as name$/
     */
    public function iCreatedWorker($firstname, $lastname)
    {
        $worker = $this->thereIsWorker($firstname, $lastname, array(
            'gender' => 'male',
            'country' => 'FR',
            'basedAt' => $this->thereIsAgency('France'),
            'street' => 'street',
            'city' => 'city',
            'type' => 'employee',
            'postcode' => 'postcode',
            'birthday' => new \DateTime('2001-01-01'),
            'diploma' => 'diploma',
            'function' => 'function',
            'arrivedAt' => new \DateTime('2001-01-01'),
            'leftAt' => new \DateTime('2001-01-01'),
        ));

        $this->entityHasPhones(array(array('type' => 'phone', 'number' => '0512457812')), $worker);
    }

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
                'number' => $additionalData['phone number'],
            );

            $this->entityHasPhones($data, $contact);

            unset($additionalData['phone type']);
            unset($additionalData['phone number']);
        }

        if (array_key_exists('email label', $additionalData)
            && array_key_exists('email address', $additionalData)) {
            $data = array(
                'label' => $additionalData['email label'],
                'address' => $additionalData['email address'],
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
            $this->thereIsPhone(PhoneTypes::PHONE, '0245145122')
        );
    }

    /**
     * @Given /^There are following agencies:$/
     */
    public function thereAreFollowingAgencies(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsAgency($data['name'], $data);
        }
    }

    /**
     * @Given /^Agency "([^"]*)" has following emails:$/
     */
    public function agencyHasFollowingEmail($name, TableNode $table)
    {
        $agency = $this->getAgencyByName($name);

        $this->entityHasEmails($table->getHash(), $agency);
    }

    /**
     * @Given /^Agency "([^"]*)" has following phones:$/
     */
    public function agencyHasFollowingPhones($name, TableNode $table)
    {
        $agency = $this->getAgencyByName($name);

        $this->entityHasPhones($table->getHash(), $agency);
    }

    /**
     * @Given /^There is agency "([^""]*)"$/
     */
    public function thereIsAgency($name, array $additionalData = array())
    {
        /** @var Agency $agency */
        $agency = $this->getAgencyRepository()->createNew();
        $agency->setName($name);

        if (count($additionalData) > 0) {
            $this->setDataToObject($agency, $additionalData);
        }

        return $this->persistAndFlush($agency);
    }

    /**
     * @Given /^I created agency "([^""]*)"$/
     */
    public function iCreatedAgency($name)
    {
        return $this->thereIsAgency($name, array(
            'street' => 'street',
            'city' => 'city',
            'postcode' => 'postcode',
            'country' => 'country',
        ));
    }

    /**
     * Get contact
     *
     * @param string $firstname
     * @param string $lastname
     *
     * @return Contact
     */
    private function getContactByName($firstname, $lastname)
    {
        return $this->getContactRepository()->findOneBy(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
        ));
    }

    /**
     * Get worker resource
     *
     * @param string $firstname
     * @param string $lastname
     *
     * @return Worker
     */
    protected function getWorkerByName($firstname, $lastname)
    {
        return $this->getWorkerRepository()->findOneBy(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
        ));
    }

    /**
     * Get agency resource
     *
     * @param string $name
     *
     * @return Agency
     */
    protected function getAgencyByName($name)
    {
        return $this->getAgencyRepository()->findOneBy(array('name' => $name));
    }

    /**
     * @return EntityRepository
     */
    protected function getContactRepository()
    {
        return $this->getRepository('contact');
    }

    /**
     * @return EntityRepository
     */
    protected function getWorkerRepository()
    {
        return $this->getRepository('worker');
    }

    /**
     * @return EntityRepository
     */
    protected function getAgencyRepository()
    {
        return $this->getRepository('agency');
    }
}
