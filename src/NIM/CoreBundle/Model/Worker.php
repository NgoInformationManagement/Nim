<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use NIM\MissionBundle\Model\MissionInterface;
use NIM\VaccineBundle\Model\VaccineInterface;
use \NIM\WorkerBundle\Model\Worker as BaseWorker;

class Worker extends BaseWorker
{
    protected $missions;
    protected $vaccines;

    public function __construct()
    {
        parent::__construct();

        $this->missions = new ArrayCollection();
        $this->vaccines = new ArrayCollection();
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
     * @param  MissionInterface $mission
     * @return $this
     */
    public function addMission(MissionInterface $mission)
    {
        if (!$this->getMissions()->contains($mission)) {
            $this->getMissions()->add($mission);
        }

        return $this;
    }

    /**
     * @param MissionInterface $mission
     */
    public function removeMission(MissionInterface $mission)
    {
        if ($this->getMissions()->contains($mission)) {
            $this->getMissions()->removeElement($mission);
        }
    }

    /**
     * @return bool
     */
    public function hasMissions()
    {
        return !$this->getMissions()->isEmpty();
    }

    /**
     * @param  ArrayCollection $vaccines
     * @return $this
     */
    public function setVaccines(ArrayCollection $vaccines)
    {
        $this->vaccines = $vaccines;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getVaccines()
    {
        return $this->vaccines;
    }

    /**
     * @return bool
     */
    public function hasVaccines()
    {
        return !$this->getVaccines()->isEmpty();
    }

    /**
     * @param VaccineInterface $vaccine
     */
    public function addVaccine(VaccineInterface $vaccine)
    {
        if (!$this->getVaccines()->contains($vaccine)) {
            $this->getVaccines()->add($vaccine);
        }
    }

    /**
     * @param VaccineInterface $vaccine
     */
    public function removeVaccine(VaccineInterface $vaccine)
    {
        if ($this->getVaccines()->contains($vaccine)) {
            $this->getVaccines()->removeElement($vaccine);
        }
    }
}
