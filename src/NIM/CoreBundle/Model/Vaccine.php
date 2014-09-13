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
use NIM\VaccineBundle\Model\Vaccine as BaseVaccine;

class Vaccine extends BaseVaccine implements VaccineInterface
{
    /**
     * @var ArrayCollection
     */
    protected $workers;

    public function __construct()
    {
        parent::__construct();

        $this->workers = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function setWorkers(ArrayCollection $workers)
    {
        $this->workers = $workers;
    }

    /**
     * {@inheritdoc}
     */
    public function getWorkers()
    {
        return $this->workers;
    }

    /**
     * {@inheritdoc}
     */
    public function addWorker(WorkerInterface $worker)
    {
        if (!$this->getWorkers()->contains($worker)) {
            $worker->addVaccine($this);
            $this->getWorkers()->add($worker);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeWorker(WorkerInterface $worker)
    {
        if ($this->getWorkers()->contains($worker)) {
            $this->getWorkers()->removeElement($worker);
        }
    }
}
