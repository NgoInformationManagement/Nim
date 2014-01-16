<?php

namespace spec\NIM\MissionBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NIMMissionExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\MissionBundle\DependencyInjection\NIMMissionExtension');
    }

    function it_should_extends_nim_extension()
    {
        $this->shouldHaveType('NIM\CoreBundle\DependencyInjection\NIMCoreExtension');
    }

    function it_should_extends_symfony_extension()
    {
        $this->shouldHaveType('Symfony\Component\DependencyInjection\Extension\Extension');
    }
}
