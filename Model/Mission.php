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
use NIM\MissionBundle\Model\Mission as BaseMission;
use NIM\WorkerBundle\Model\WorkerInterface;

class Mission extends BaseMission
{
    protected $workers;

    public function __construct()
    {
        parent::__construct();

        $this->workers = new ArrayCollection();
    }

    /**
     * @param mixed $workers
     */
    public function setWorkers($workers)
    {
        $this->workers = $workers;
    }

    /**
     * @param  WorkerInterface $worker
     * @return $this
     */
    public function addWorker(WorkerInterface $worker)
    {
        if (!$this->getWorkers()->contains($worker)) {
            $worker->addMission($this);
            $this->getWorkers()->add($worker);
        }

        return $this;
    }

    /**
     * @param WorkerInterface $worker
     */
    public function removeWorker(WorkerInterface $worker)
    {
        if ($this->getWorkers()->contains($worker)) {
            $this->getWorkers()->removeElement($worker);
        }
    }

    /**
     * @return mixed
     */
    public function getWorkers()
    {
        return $this->workers;
    }
}
