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

class VisaTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('My\Bundle\Model', array('validation_group'));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Form\Type\VisaType');
    }

    public function it_should_build_contact_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('country', 'country',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('startedAt', 'date',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('length', 'integer',  Argument::any())
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
        $this->getName()->shouldReturn('nim_visa');
    }
}
