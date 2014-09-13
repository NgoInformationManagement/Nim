<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\CoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use NIM\CoreBundle\Model\MissionInterface;
use NIM\CoreBundle\Model\VaccineInterface;
use PhpSpec\ObjectBehavior;

class WorkerSpec extends ObjectBehavior
{
    public function its_vaccines_is_mutable(ArrayCollection $arrayCollection)
    {
        $this->setVaccines($arrayCollection);
        $this->getVaccines()->shouldReturn($arrayCollection);
    }

    public function it_has_collection_of_vaccines(VaccineInterface $vaccine1, VaccineInterface $vaccine2)
    {
        $this->addVaccine($vaccine1);
        $this->addVaccine($vaccine2);
        $this->getVaccines()->shouldHaveCount(2);
    }

    public function it_has_vaccines(VaccineInterface $vaccine1, VaccineInterface $vaccine2)
    {
        $this->addVaccine($vaccine1);
        $this->addVaccine($vaccine2);
        $this->hasVaccines()->shouldReturn(true);
    }

    public function it_should_have_not_vaccines_by_default()
    {
        $this->hasVaccines()->shouldReturn(false);
    }

    public function it_has_unique_vaccines(VaccineInterface $vaccine)
    {
        $this->addVaccine($vaccine);
        $this->addVaccine($vaccine);
        $this->getVaccines()->shouldHaveCount(1);
    }

    public function it_can_remove_vaccines(VaccineInterface $vaccine1, VaccineInterface $vaccine2)
    {
        $this->addVaccine($vaccine1);
        $this->addVaccine($vaccine2);

        $this->removeVaccine($vaccine2);
        $this->getVaccines()->shouldHaveCount(1);
    }

    public function its_missions_is_mutable(ArrayCollection $arrayCollection)
    {
        $this->setMissions($arrayCollection);
        $this->getMissions()->shouldReturn($arrayCollection);
    }

    public function it_has_collection_of_missions(MissionInterface $mission1, MissionInterface $mission2)
    {
        $this->addMission($mission1);
        $this->addMission($mission2);
        $this->getMissions()->shouldHaveCount(2);
    }

    public function it_has_missions(MissionInterface $mission1, MissionInterface $mission2)
    {
        $this->addMission($mission1);
        $this->addMission($mission2);
        $this->hasMissions()->shouldReturn(true);
    }

    public function it_should_have_not_missions_by_default()
    {
        $this->hasMissions()->shouldReturn(false);
    }

    public function it_has_unique_missions(MissionInterface $mission)
    {
        $this->addMission($mission);
        $this->addMission($mission);
        $this->getMissions()->shouldHaveCount(1);
    }

    public function it_can_remove_missions(MissionInterface $mission1, MissionInterface $mission2)
    {
        $this->addMission($mission1);
        $this->addMission($mission2);

        $this->removeMission($mission2);
        $this->getMissions()->shouldHaveCount(1);
    }
}
