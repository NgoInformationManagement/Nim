<?php

namespace spec\Nim\Bundle\ThemeBundle\Form\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\ThemeBundle\Form\Extension\CollectionExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('collection');
    }
}
