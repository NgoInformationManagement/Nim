<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WorkerBundle\EventListener;

use Nim\Bundle\WorkerBundle\Model\Worker;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Test\FormBuilderInterface;

class WorkerSubcriberSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\EventListener\WorkerSubscriber');
    }

    public function it_sould_implement()
    {
        $this->shouldImplement('Symfony\Component\EventDispatcher\EventSubscriberInterface');
    }

    public function it_should_subscribe_to_pre_set_event()
    {
        $this->getSubscribedEvents()->shouldReturn(array(
            FormEvents::PRE_SET_DATA => 'preSetData',
        ));
    }

    public function it_should_add_fields_to_worker_form(FormBuilderInterface $builder, FormEvent $event, Worker $worker)
    {
        $worker->getId()->willReturn(1);
        $event->getData()->willReturn($worker);
        $event->getForm()->willReturn($builder);

        $builder
            ->add('contacts', 'collection',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->preSetData($event);
    }
}
