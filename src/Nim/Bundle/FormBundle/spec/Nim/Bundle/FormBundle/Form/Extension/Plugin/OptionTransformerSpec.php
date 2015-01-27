<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Form\Extension\Plugin;

use PhpSpec\ObjectBehavior;

class OptionTransformerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Extension\Plugin\OptionTransformer');
    }

    public function its_form_options_is_mutable()
    {
        $this->setOptions(array())->shouldReturn($this);
    }

    public function its_configuration_is_mutable()
    {
        $this->setConfiguration(array())->shouldReturn($this);
    }

    public function it_should_generate_javascript_options()
    {
        $this->setOptions(array(
            'optionName' => 'optionValue',
            'wrongOption' => 'wrongOption',
            'plugin_rendered' => 'plugin_rendered',
        ));

        $this->setConfiguration(array(
            'plugin_rendered' => array(
                'excluded' => true,
            ),
            'get_from_factory' => array(
                'excluded' => true,
            ),
            'optionName' => array()
        ));

        $this->transform()->shouldReturn('{"optionName":"optionValue"}');
    }

    public function it_should_generate_javascript_options_and_call_the_factory()
    {
        $this->setOptions(array(
            'optionName' => 'optionValue',
            'wrongOption' => 'wrongOption',
            'plugin_rendered' => 'plugin_rendered',
            'get_from_factory' => array('optionName'),
        ));

        $this->setConfiguration(array(
            'plugin_rendered' => array(
                'excluded' => true,
            ),
            'get_from_factory' => array(
                'excluded' => true,
            ),
            'optionName' => array()
        ));

        $this->transform()->shouldReturn('{"optionName":$.PluginOptionsFactory.get("optionValue")}');
    }
}
