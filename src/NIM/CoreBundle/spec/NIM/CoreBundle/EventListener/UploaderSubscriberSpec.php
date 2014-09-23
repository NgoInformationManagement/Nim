<?php

namespace spec\NIM\CoreBundle\EventListener;

use Doctrine\Common\Persistence\ObjectManager;
use NIM\CoreBundle\Model\MissionAsset;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\File\File;

class UploaderSubscriberSpec extends ObjectBehavior
{
    function let(EntityRepository $repository, ObjectManager $objectManager)
    {
        $this->beConstructedWith($repository, $objectManager);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\CoreBundle\EventListener\UploaderSubscriber');
    }

    function it_is_a_subscriber()
    {
        $this->shouldImplement('Symfony\Component\EventDispatcher\EventSubscriberInterface');
    }

    public function it_should_subscribes_events()
    {
        $this::getSubscribedEvents()->shouldReturn(array(
            'oneup_uploader.post_persist' => array(
                array('createAsset', 1),
            ),
        ));
    }

    function it_creates_a_asset_after_upload(
        PostPersistEvent $event,
        EntityRepository $repository,
        MissionAsset $asset,
        ObjectManager $objectManager,
        File $file
    ) {
        $event->getFile()->willReturn($file);
        $file->getFilename()->willReturn('photo.jpg');

        $repository->createNew()->willReturn($asset);
        $objectManager->persist($asset)->shouldBeCalled();
        $objectManager->flush()->shouldBeCalled();

        $this->createAsset($event);
    }
}
