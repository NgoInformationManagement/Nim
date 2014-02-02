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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhoneCollectionTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Form\Type\Contactable\PhoneCollectionType');
    }

    public function it_should_configure_the_form(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array())->shouldBeCalled();

        $resolver->setDefaults(array(
            'type' => 'nim_contactable_phone',
            'label' => 'worker.field.phone.label',
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_sould_configure_validation_groups(OptionsResolverInterface $resolver)
    {
        $this->setValidationGroups(array('nim'));

        $resolver->setDefaults(array('validation_groups' => array('nim')))->shouldBeCalled();

        $resolver->setDefaults(array(
            'type' => 'nim_contactable_phone',
            'label' => 'worker.field.phone.label',
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_contactable_collection_phone');
    }

    public function it_should_a_parent()
    {
        $this->getParent()->shouldReturn('collection');
    }
}
