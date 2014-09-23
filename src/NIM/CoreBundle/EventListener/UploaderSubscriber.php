<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle\EventListener;

use Doctrine\Common\Persistence\ObjectManager;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use Oneup\UploaderBundle\Event\PreUploadEvent;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\File\File;

class UploaderSubscriber implements EventSubscriberInterface
{
    private $repository;
    private $objectManager;

    public function __construct(EntityRepository $repository, ObjectManager $objectManager)
    {
        $this->repository = $repository;
        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'oneup_uploader.post_persist' => array(
                array('createAsset', 1),
            ),
        );
    }

    public function createAsset(PostPersistEvent $event)
    {
        /** @var File $file */
        $file = $event->getFile();
        $response = $event->getResponse();

        $asset = $this->repository->createNew();
        $asset->setFile(sprintf('media/%s', $file->getFilename()));

        $this->objectManager->persist($asset);
        $this->objectManager->flush();

        $response['files'] = array(
            'name' => $file->getFilename(),
            'size' => $file->getSize(),
            'url' => ''
        );
    }
}
