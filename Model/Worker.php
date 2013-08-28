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

class Worker
{
    const TYPE_EMPLOYEE = 'employee';
    const TYPE_VOLUNTEER = 'volunteer';
    const TYPE_INTERN = 'intern';

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    protected $id;
    protected $gender;
    protected $firstname;
    protected $lastname;
    protected $address;
    protected $birthday;
    protected $diploma;
    protected $function;
    protected $arrivedAt;
    protected $leftAt;
    protected $phoneNumber;
    protected $cellphoneNumber;
    protected $email;
    protected $type;
    protected $socialSecurityNumber;
    protected $isReadyToGoOnField;
    protected $isActive;
    protected $nationalities;
    protected $visas;
    protected $passports;
    protected $contacts;
    protected $basedAt;
    protected $missions;
    protected $createdBy;
    protected $createdAt;
    protected $updatedAt;

    public function __construct()
    {
        $this->nationalities = new ArrayCollection();
        $this->visas = new ArrayCollection();
        $this->passports = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $arrivedAt
     */
    public function setArrivedAt($arrivedAt)
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
     * @param mixed $basedAt
     */
    public function setBasedAt($basedAt)
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
    public function setBirthday($birthday)
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
     * @param mixed $cellphoneNumber
     */
    public function setCellphoneNumber($cellphoneNumber)
    {
        $this->cellphoneNumber = $cellphoneNumber;
    }

    /**
     * @return mixed
     */
    public function getCellphoneNumber()
    {
        return $this->cellphoneNumber;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $contacts
     */
    public function setContacts($contacts)
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
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
     * @param mixed $leftAt
     */
    public function setLeftAt($leftAt)
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
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
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
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
