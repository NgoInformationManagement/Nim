<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\VaccineBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VaccineEntityTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\VaccineBundle\Form\Type\VaccineEntityType');
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $this->setValidationGroups(array('nim'));
        $this->setDataClass('vaccine');

        $resolver->setDefaults(array(
            'data_class' => 'vaccine',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $resolver->setDefaults(array(
            'class' => 'NIM\VaccineBundle\Model\Vaccine',
            'expanded' => true,
            'multiple' => true,
            'property' => 'EntityFormTypeData'
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_entity_vaccine');
    }

    public function it_should_have_parent()
    {
        $this->getParent()->shouldReturn('entity');
    }
}
