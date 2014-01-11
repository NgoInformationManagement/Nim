<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Form\Extension\Plugin;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MjolnicColorpickerExtensionSpec extends ObjectBehavior
{
    private $options = array(
        'format' =>  array(
            'allowed_types' => array('string'),
            'allowed_value' => array('hex', 'rgb', 'rgba', 'hsl', 'hsla'),
        ),
        'color' => array('allowed_types' => array('string')),
        'container' => array('allowed_types' => array('string')),
        'component' => array('allowed_types' => array('string')),
        'input' => array('allowed_types' => array('string')),
        'horizontal' => array('allowed_types' => array('bool')),
        'template' => array('allowed_types' => array('string')),
        'plugin_rendered'=> array(
            'default' => 'plugin',
            'allowed_types' => array('string'),
            'allowed_value' => array('plugin', 'none'),
        ),
    );

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\MjolnicColorpickerExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\AbstractPluginExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('colorpicker');
    }

    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        foreach ($this->options as $optionName => $options) {
            if (isset($options['allowed_values'])) {
                $resolver->addAllowedValues(array($optionName => $options['allowed_values']))
                    ->shouldBeCalled();
            }

            if (isset($options['allowed_types'])) {
                $resolver->addAllowedTypes(array($optionName => $options['allowed_types']))
                    ->shouldBeCalled();
            }

            if (isset($options['default'])) {
                $resolver->replaceDefaults(array($optionName => $options['default']))
                    ->shouldBeCalled();
            }
        }

        $resolver->setOptional(array_keys($this->options))
            ->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array());
    }
}
