<?php

namespace Nim\Bundle\WorkerBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Nim\Bundle\WorkerBundle\Model\Agency;
use Nim\Bundle\WorkerBundle\Model\Worker;
use Sylius\Component\Resource\Event\ResourceEvent;

class SoftDeletableListener
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param ResourceEvent $event
     */
    public function agencyDeletion(ResourceEvent $event)
    {
        /** @var Agency $agency */
        $agency = $event->getSubject();

        foreach ($agency->getWorkers() as $worker) {
            /** @var Worker $worker */
            $worker->setBasedAt(null);
            $this->entityManager->persist($worker);
        }
        $this->entityManager->flush();
    }
}
