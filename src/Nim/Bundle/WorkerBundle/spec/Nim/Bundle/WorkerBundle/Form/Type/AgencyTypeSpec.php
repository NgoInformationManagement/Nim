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

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AgencyTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('My\Bundle\Model', array('validation_group'));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Form\Type\AgencyType');
    }

    public function it_should_build_agency_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('name', null,  Argument::any())
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
            ->add('emails', 'nim_email_collection', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('phones', 'nim_phone_collection', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('workers', 'nim_worker_entity', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'My\Bundle\Model',
            'validation_groups' => array('validation_group'),
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_agency');
    }
}
