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
use NIM\WorkerBundle\Model\WorkerInterface as BaseWorkerInterface;
use NIM\VaccineBundle\Model\VaccineInterface;

interface WorkerInterface extends BaseWorkerInterface
{
    /**
     * @param ArrayCollection $missions
     */
    public function setMissions(ArrayCollection $missions);

    /**
     * @return ArrayCollection
     */
    public function getMissions();

    /**
     * @param MissionInterface $mission
     *
     * @return $this
     */
    public function addMission(MissionInterface $mission);

    /**
     * @param MissionInterface $mission
     */
    public function removeMission(MissionInterface $mission);

    /**
     * @return bool
     */
    public function hasMissions();

    /**
     * @param ArrayCollection $vaccines
     *
     * @return $this
     */
    public function setVaccines(ArrayCollection $vaccines);

    /**
     * @return ArrayCollection
     */
    public function getVaccines();

    /**
     * @return bool
     */
    public function hasVaccines();

    /**
     * @param VaccineInterface $vaccine
     */
    public function addVaccine(VaccineInterface $vaccine);

    /**
     * @param VaccineInterface $vaccine
     */
    public function removeVaccine(VaccineInterface $vaccine);
}
