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
use NIM\WorkerBundle\Model\Agency;
use NIM\WorkerBundle\Model\Contact;
use NIM\WorkerBundle\Model\Email;
use NIM\WorkerBundle\Model\Phone;
use NIM\WorkerBundle\Model\Worker;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

trait WorkerDataContext
{
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
    public function workerHasFollowingContanct($firstname, $lastname, TableNode $table)
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
        $this->thereIsWorker($firstname, $lastname, array(
            'gender' => 'male',
            'country' => 'FR',
            'basedAt' => $this->thereIsAgency('France'),
            'street' => 'street',
            'city' => 'city',
            'postcode' => 'postcode',
            'birthday' => new \DateTime('2001-01-01'),
            'diploma' => 'diploma',
            'function' => 'function',
            'arrivedAt' => new \DateTime('2001-01-01'),
            'leftAt' => new \DateTime('2001-01-01'),
        ));
    }

    /**
     * Get worker resource
     *
     * @param $firstname
     * @param $lastname
     * @return Worker
     */
    private function getWorkerByName($firstname, $lastname)
    {
        return $this->getWorkerRepository()->findOneBy(array(
            'firstname' => $firstname,
            'lastname'=> $lastname
        ));
    }

    /**
     * @return EntityRepository
     */
    private function getWorkerRepository()
    {
        return $this->getRepository('worker');
    }
}