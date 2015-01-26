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
use Nim\Bundle\MissionBundle\Model\MissionInterface as BaseMissionInterface;

interface MissionInterface extends BaseMissionInterface
{
    /**
     * @param mixed $workers
     */
    public function setWorkers(ArrayCollection $workers);

    /**
     * @return ArrayCollection
     */
    public function getWorkers();

    /**
     * @param WorkerInterface $worker
     *
     * @return $this
     */
    public function addWorker(WorkerInterface $worker);

    /**
     * @param WorkerInterface $worker
     */
    public function removeWorker(WorkerInterface $worker);
}
