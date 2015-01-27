<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WorkerBundle\Form\Type;

use Nim\Bundle\WorkerBundle\Form\EventListener\WorkerSubscriber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkerTypeSpec extends ObjectBehavior
{
    public function let(WorkerSubscriber $workerSubscriber)
    {
        $this->beConstructedWith($workerSubscriber);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Form\Type\WorkerType');
    }

    public function it_should_build_worker_form(
        FormBuilderInterface $builder,
        WorkerSubscriber $workerSubscriber
    ) {
        $builder
            ->add('basedAt', 'entity',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('gender', 'gender',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('firstname', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('lastname', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('street', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('postcode', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('city', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('country', 'country', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('emails', 'nim_contactable_collection_email', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('phones', 'nim_contactable_collection_phone', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('birthday', 'birthday',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('diploma', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('function', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('arrivedAt', 'date',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('leftAt', 'date',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('type', 'choice',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->addEventSubscriber($workerSubscriber)
            ->shouldBeCalled();

        $this->buildForm($builder, array());
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_worker');
    }
}
