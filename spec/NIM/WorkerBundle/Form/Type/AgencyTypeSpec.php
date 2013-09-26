<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\WorkerBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AgencyTypeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('agency', array('nim'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Form\Type\AgencyType');
    }

    function it_should_build_agency_form(FormBuilderInterface $builder)
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
            ->add('phoneNumber', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('fax', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('email', 'email',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'agency',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_agency');
    }
}
