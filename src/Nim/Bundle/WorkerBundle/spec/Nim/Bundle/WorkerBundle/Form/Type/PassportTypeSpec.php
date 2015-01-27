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

class PassportTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Form\Type\PassportType');
    }

    public function it_should_build_contact_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('country', 'country',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('number', null,  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('dateOfIssue', 'date',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('dateOfExpiry', 'date',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $this->setValidationGroups(array('nim'));
        $this->setDataClass('passport');

        $resolver->setDefaults(array(
            'data_class' => 'passport',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_passport');
    }
}
