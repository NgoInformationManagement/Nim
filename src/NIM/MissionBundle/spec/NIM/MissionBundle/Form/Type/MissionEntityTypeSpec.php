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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MissionEntityTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('\Model\Mission');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\MissionBundle\Form\Type\MissionEntityType');
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $this->setValidationGroups(array('nim'));
        $this->setDataClass('mission');

        $resolver->setDefaults(array(
            'data_class' => 'mission',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $resolver->setDefaults(array(
            'class' => '\Model\Mission',
            'expanded' => true,
            'multiple' => true,
            'property' => 'EntityFormTypeData'
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_entity_mission');
    }

    public function it_should_have_parent()
    {
        $this->getParent()->shouldReturn('entity');
    }
}
