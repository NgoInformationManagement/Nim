<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\WorkerBundle\Form\Type\Contactable;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailTypeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('email', array('nim'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Form\Type\Contactable\EmailType');
    }

    function it_should_build_agency_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('label', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('address', 'email',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'email',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_contactable_email');
    }
}
