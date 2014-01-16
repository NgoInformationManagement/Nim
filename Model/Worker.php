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
use NIM\WorkerBundle\Model\Entity\PersonAbstract;

class Worker extends PersonAbstract
{
    const TYPE_EMPLOYEE = 'employee';
    const TYPE_VOLUNTEER = 'volunteer';
    const TYPE_INTERN = 'intern';

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

    protected $nationalities;
    protected $type;
    protected $socialSecurityNumber;
    protected $isReadyToGoOnField;
    protected $isActive;
    protected $visas;
    protected $passports;
    protected $missions;

    public function __construct()
    {
        parent::__construct();

        $this->nationalities = new ArrayCollection();
        $this->visas = new ArrayCollection();
        $this->passports = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $arrivedAt
     */
    public function setArrivedAt(\DateTime $arrivedAt = null)
    {
        $this->arrivedAt = $arrivedAt;
    }

    /**
     * @return mixed
     */
    public function getArrivedAt()
    {
        return $this->arrivedAt;
    }

    /**
     * @param mixed $leftAt
     */
    public function setLeftAt(\DateTime $leftAt = null)
    {
        $this->leftAt = $leftAt;
    }

    /**
     * @return mixed
     */
    public function getLeftAt()
    {
        return $this->leftAt;
    }

    /**
     * @param mixed $basedAt
     */
    public function setBasedAt(Agency $basedAt)
    {
        $this->basedAt = $basedAt;
    }

    /**
     * @return mixed
     */
    public function getBasedAt()
    {
        return $this->basedAt;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday(\DateTime $birthday = null)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $diploma
     */
    public function setDiploma($diploma)
    {
        $this->diploma = $diploma;
    }

    /**
     * @return mixed
     */
    public function getDiploma()
    {
        return $this->diploma;
    }

    /**
     * @param mixed $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * @return mixed
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $contacts
     */
    public function setContacts(ArrayCollection $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
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
     * @param \NIM\WorkerBundle\Model\Email $contact
     */
    public function addContact(Contact $contact)
    {
        if (!$this->getContacts()->contains($contact)) {
            $this->getContacts()->add($contact);
        }
    }

    /**
     * @param \NIM\WorkerBundle\Model\Contact $contact
     */
    public function removeContact(Contact $contact)
    {
        if ($this->getContacts()->contains($contact)) {
            $this->getContacts()->removeElement($contact);
        }
    }

    /**
     * @param mixed $missions
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;
    }

    /**
     * @return mixed
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isReadyToGoOnField
     */
    public function setIsReadyToGoOnField($isReadyToGoOnField)
    {
        $this->isReadyToGoOnField = $isReadyToGoOnField;
    }

    /**
     * @return mixed
     */
    public function getIsReadyToGoOnField()
    {
        return $this->isReadyToGoOnField;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $nationalities
     */
    public function setNationalities($nationalities)
    {
        $this->nationalities = $nationalities;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNationalities()
    {
        return $this->nationalities;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $passports
     */
    public function setPassports($passports)
    {
        $this->passports = $passports;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPassports()
    {
        return $this->passports;
    }

    /**
     * @param mixed $socialSecurityNumber
     */
    public function setSocialSecurityNumber($socialSecurityNumber)
    {
        $this->socialSecurityNumber = $socialSecurityNumber;
    }

    /**
     * @return mixed
     */
    public function getSocialSecurityNumber()
    {
        return $this->socialSecurityNumber;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $visas
     */
    public function setVisas($visas)
    {
        $this->visas = $visas;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getVisas()
    {
        return $this->visas;
    }
}
