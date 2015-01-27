<?php

namespace spec\Nim\Bundle\MissionBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;

class ConfigurationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\MissionBundle\DependencyInjection\Configuration');
    }

    public function it_should_implement_symfony_configuration_interface()
    {
        $this->shouldImplement('Symfony\Component\Config\Definition\ConfigurationInterface');
    }

    public function it_should_return_tree_builder()
    {
        $this->getConfigTreeBuilder()->shouldHaveType('Symfony\Component\Config\Definition\Builder\TreeBuilder');
    }
}
