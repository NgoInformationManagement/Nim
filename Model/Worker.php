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
use NIM\MissionBundle\Model\Mission;
use NIM\WorkerBundle\Model\Core\WorkerInterface;

class Worker extends AbstractPerson implements WorkerInterface
{
    protected $id;
    protected $gender;
    protected $birthday;
    protected $diploma;
    protected $function;
    protected $arrivedAt;
    protected $leftAt;
    protected $basedAt;
    protected $contacts;
    protected $type;

    protected $visas;
    protected $passports;
    protected $missions;

//    protected $socialSecurityNumber;
//    protected $isReadyToGoOnField;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->visas = new ArrayCollection();
        $this->passports = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->missions = new ArrayCollection();
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
    public function setBasedAt(Agency $basedAt = null)
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
     * @param Mission $mission
     * @return $this
     */
    public function addMission(Mission $mission)
    {
        if (!$this->getMissions()->contains($mission)) {
            $this->getMissions()->add($mission);
        }

        return $this;
    }

    /**
     * @param Mission $mission
     */
    public function removeMission(Mission $mission)
    {
        if ($this->getMissions()->contains($mission)) {
            $this->getMissions()->removeElement($mission);
        }
    }

    /**
     * @param ArrayCollection $passports
     * @return $this
     */
    public function setPassports(ArrayCollection $passports)
    {
        $this->passports = $passports;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPassports()
    {
        return $this->passports;
    }

    /**
     * @return bool
     */
    public function hasPassports()
    {
        return !$this->getPassports()->isEmpty();
    }

    /**
     * @param Passport $passport
     */
    public function addPassport(Passport $passport)
    {
        if (!$this->getPassports()->contains($passport)) {
            $this->getPassports()->add($passport);
        }
    }

    /**
     * @param Passport $passport
     */
    public function removePassport(Passport $passport)
    {
        if ($this->getPassports()->contains($passport)) {
            $this->getPassports()->removeElement($passport);
        }
    }

    /**
     * @param ArrayCollection $visas
     * @return $this
     */
    public function setVisas(ArrayCollection $visas)
    {
        $this->visas = $visas;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getVisas()
    {
        return $this->visas;
    }

    /**
     * @return bool
     */
    public function hasVisas()
    {
        return !$this->getVisas()->isEmpty();
    }

    /**
     * @param Visa $visa
     */
    public function addVisa(Visa $visa)
    {
        if (!$this->getVisas()->contains($visa)) {
            $this->getVisas()->add($visa);
        }
    }

    /**
     * @param Visa $visa
     */
    public function removeVisa(Visa $visa)
    {
        if ($this->getVisas()->contains($visa)) {
            $this->getVisas()->removeElement($visa);
        }
    }

    /**
     * @return array
     */
    public function getEntityFormTypeData()
    {
        return array(
            'name' => $this->getFullName(),
            'country' => $this->getCountry(),
            'function' => $this->getFunction(),
            'type' => $this->getType()
        );
    }
}
