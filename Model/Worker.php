<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model;

use \Doctrine\Common\Collections\ArrayCollection;
use NIM\WorkerBundle\Model\AbstractPerson;
use NIM\WorkerBundle\Model\Core\WorkerInterface;

class Worker extends AbstractPerson implements WorkerInterface
{
    protected $id;
    protected $gender;
    protected $firstname;
    protected $lastname;
    protected $birthday;
    protected $diploma;
    protected $function;
    protected $arrivedAt;
    protected $leftAt;
    protected $basedAt;
    protected $contacts;
    protected $type;

//    protected $nationalities;
//    protected $socialSecurityNumber;
//    protected $isReadyToGoOnField;
//    protected $isActive;
//    protected $visas;
//    protected $passports;
//    protected $missions;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->nationalities = new ArrayCollection();
        $this->visas = new ArrayCollection();
        $this->passports = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * {@inheritdoc}
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * {@inheritdoc}
     */
    public function setBasedAt(Agency $basedAt)
    {
        $this->basedAt = $basedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getBasedAt()
    {
        return $this->basedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setDiploma($diploma)
    {
        $this->diploma = $diploma;
    }

    /**
     * {@inheritdoc}
     */
    public function getDiploma()
    {
        return $this->diploma;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setArrivedAt(\DateTime $arrivedAt = null)
    {
        $this->arrivedAt = $arrivedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getArrivedAt()
    {
        return $this->arrivedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday(\DateTime $birthday = null)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $leftAt
     */
    public function setLeftAt(\DateTime $leftAt = null)
    {
        $this->leftAt = $leftAt;
    }

    /**
     * @return \DateTime
     */
    public function getLeftAt()
    {
        return $this->leftAt;
    }

    /**
     * @param ArrayCollection $contacts
     */
    public function setContacts(ArrayCollection $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return ArrayCollection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @return bool
     */
    public function hasContacts()
    {
        return !$this->getContacts()->isEmpty();
    }

    /**
     * @param Contact $contact
     */
    public function addContact(Contact $contact)
    {
        if (!$this->getContacts()->contains($contact)) {
            $this->getContacts()->add($contact);
        }
    }

    /**
     * @param Contact $contact
     */
    public function removeContact(Contact $contact)
    {
        if ($this->getContacts()->contains($contact)) {
            $this->getContacts()->removeElement($contact);
        }
    }
}
