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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkerEntityTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('\Model\Worker');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Form\Type\WorkerEntityType');
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $this->setValidationGroups(array('nim'));
        $this->setDataClass('worker');

        $resolver->setDefaults(array(
            'data_class' => 'worker',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $resolver->setDefaults(array(
            'class' => '\Model\Worker',
            'expanded' => true,
            'multiple' => true,
            'property' => 'EntityFormTypeData'
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_entity_worker');
    }

    public function it_should_have_parent()
    {
        $this->getParent()->shouldReturn('entity');
    }
}
