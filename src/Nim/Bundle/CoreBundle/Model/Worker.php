<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\CoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Nim\Bundle\WorkerBundle\Model\Worker as BaseWorker;

class Worker extends BaseWorker implements WorkerInterface
{
    /**
     * @var ArrayCollection
     */
    protected $missions;

    /**
     * @var ArrayCollection
     */
    protected $vaccines;

    public function __construct()
    {
        parent::__construct();

        $this->missions = new ArrayCollection();
        $this->vaccines = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function setMissions(ArrayCollection $missions)
    {
        $this->missions = $missions;
    }

    /**
     * {@inheritdoc}
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * {@inheritdoc}
     */
    public function addMission(MissionInterface $mission)
    {
        if (!$this->getMissions()->contains($mission)) {
            $this->getMissions()->add($mission);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeMission(MissionInterface $mission)
    {
        if ($this->getMissions()->contains($mission)) {
            $this->getMissions()->removeElement($mission);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hasMissions()
    {
        return !$this->getMissions()->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function setVaccines(ArrayCollection $vaccines)
    {
        $this->vaccines = $vaccines;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getVaccines()
    {
        return $this->vaccines;
    }

    /**
     * {@inheritdoc}
     */
    public function hasVaccines()
    {
        return !$this->getVaccines()->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function addVaccine(VaccineInterface $vaccine)
    {
        if (!$this->getVaccines()->contains($vaccine)) {
            $this->getVaccines()->add($vaccine);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removeVaccine(VaccineInterface $vaccine)
    {
        if ($this->getVaccines()->contains($vaccine)) {
            $this->getVaccines()->removeElement($vaccine);
        }
    }
}
