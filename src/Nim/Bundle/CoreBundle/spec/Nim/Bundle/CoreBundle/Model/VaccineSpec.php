<?php

namespace spec\Nim\Bundle\CoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Nim\Bundle\CoreBundle\Model\WorkerInterface;
use PhpSpec\ObjectBehavior;

class VaccineSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\CoreBundle\Model\Vaccine');
    }

    public function it_should_extends_vaccine_model()
    {
        $this->shouldImplement('Nim\Bundle\VaccineBundle\Model\Vaccine');
    }

    public function its_worker_is_mutable(ArrayCollection $col)
    {
        $this->setWorkers($col);
        $this->getWorkers()->shouldReturn($col);
    }

    public function it_has_unique_workers(WorkerInterface $worker)
    {
        $this->addWorker($worker);
        $this->addWorker($worker);
        $this->getWorkers()->shouldHaveCount(1);
    }

    public function it_has_workers(WorkerInterface $worker1, WorkerInterface $worker2)
    {
        $this->addWorker($worker1);
        $this->addWorker($worker2);
        $this->getWorkers()->shouldHaveCount(2);
    }

    public function it_can_remove_workers(WorkerInterface $worker1, WorkerInterface $worker2)
    {
        $this->addWorker($worker1);
        $this->addWorker($worker2);

        $this->removeWorker($worker2);
        $this->getWorkers()->shouldHaveCount(1);
    }
}
