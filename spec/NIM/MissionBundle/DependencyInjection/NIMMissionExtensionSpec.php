<?php

namespace spec\NIM\MissionBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;

class NIMMissionExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\MissionBundle\DependencyInjection\NIMMissionExtension');
    }

    public function it_should_extends_nim_extension()
    {
        $this->shouldHaveType('Sylius\Bundle\ResourceBundle\DependencyInjection\AbstractResourceExtension');
    }

    public function it_should_extends_symfony_extension()
    {
        $this->shouldHaveType('Symfony\Component\DependencyInjection\Extension\Extension');
    }
}
