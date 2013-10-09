<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Form\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;

class CollectionTypeExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\CollectionTypeExtension');
    }

    function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
    }

    function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('collection');
    }

    function it_toto(FormBuilderInterface $builder)
    {
        $builder->getAttribute('prototype')->willreturn($builder);

        $builder->getAttribute('prototype')->shouldBeCalled();
        $builder->add('deleteItem', 'delete', Argument::any())->shouldBeCalled();

        $this->buildForm($builder, array(
            'allow_add' => true,
            'prototype' => true
        ));
    }
}
