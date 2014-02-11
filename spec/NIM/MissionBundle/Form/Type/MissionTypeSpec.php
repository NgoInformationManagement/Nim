<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\MissionBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MissionTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('mission', array('nim'));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\MissionBundle\Form\Type\MissionType');
    }

    /**
     * @param Symfony\Component\Form\FormBuilderInterface $builder
     */
    public function it_should_build_mission_form($builder)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('country', 'country', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('startedAt', 'date', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('endedAt', 'date', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->add('workers', 'nim_entity_worker')
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function it_should_define_assigned_data_class($resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'mission',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_mission');
    }
}
