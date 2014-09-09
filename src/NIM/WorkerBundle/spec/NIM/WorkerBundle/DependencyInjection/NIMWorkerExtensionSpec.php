<?php

namespace spec\NIM\WorkerBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;

class NIMWorkerExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\DependencyInjection\NIMWorkerExtension');
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
