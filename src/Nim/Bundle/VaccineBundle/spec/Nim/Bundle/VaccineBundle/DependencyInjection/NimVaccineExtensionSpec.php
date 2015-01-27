<?php

namespace spec\Nim\Bundle\VaccineBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;

class NimVaccineExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\VaccineBundle\DependencyInjection\NimVaccineExtension');
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
