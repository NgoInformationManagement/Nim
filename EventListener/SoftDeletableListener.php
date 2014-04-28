<?php

namespace NIM\WorkerBundle\EventListener;

use Doctrine\ORM\EntityManager;
use NIM\WorkerBundle\Model\Agency;
use NIM\WorkerBundle\Model\Worker;
use Sylius\Bundle\ResourceBundle\Event\ResourceEvent;
use Symfony\Component\EventDispatcher\GenericEvent;

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

        foreach($agency->getWorkers() as $worker) {
            /** @var Worker $worker */
            $worker->setBasedAt(null);
            $this->entityManager->persist($worker);
        }
        $this->entityManager->flush();
    }
} 