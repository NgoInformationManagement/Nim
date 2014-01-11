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

class Select2ExtensionSpec extends ObjectBehavior
{
    private $options = array(
        'width'=> array(
            'default' => 'element',
            'allowed_types' => array('string'),
        ),
        'load_more_padding'=> array('allowed_types' => array('integer')),
        'close_on_select'=> array('allowed_types' => array('bool')),
        'open_on_enter'=> array('allowed_types' => array('bool')),
        'container_css'=> array('allowed_types' => array('string')),
        'dropdown_css'=> array('allowed_types' => array('string')),
        'container_css_class'=> array('allowed_types' => array('string')),
        'dropdown_css_class'=> array('allowed_types' => array('string')),
        'format_result'=> array('allowed_types' => array('string')),
        'format_selection'=> array('allowed_types' => array('string')),
        'sort_results'=> array('allowed_types' => array('string')),
        'format_result_css_class'=> array('allowed_types' => array('string')),
        'format_selection_css_class'=> array('allowed_types' => array('string')),
        'format_no_matches'=> array('allowed_types' => array('string')),
        'format_input_too_short'=> array('allowed_types' => array('string')),
        'format_input_too_long'=> array('allowed_types' => array('string')),
        'format_selection_too_big'=> array('allowed_types' => array('string')),
        'format_load_more'=> array('allowed_types' => array('string')),
        'format_searching'=> array('allowed_types' => array('string')),
        'minimum_results_for_search'=> array('allowed_types' => array('integer')),
        'minimum_input_length'=> array('allowed_types' => array('integer')),
        'maximum_input_length'=> array('allowed_types' => array('integer')),
        'maximum_selection_size'=> array('allowed_types' => array('integer')),
        'id'=> array('allowed_types' => array('string')),
        'matcher'=> array('allowed_types' => array('string')),
        'separator'=> array('allowed_types' => array('string')),
        'token_separators'=> array('allowed_types' => array('array')),
        'tokenizer'=> array('allowed_types' => array('string')),
        'escape_markup'=> array('allowed_types' => array('string')),
        'blur_on_change'=> array('allowed_types' => array('bool')),
        'select_on_blur'=> array('allowed_types' => array('bool')),
        'adapt_container_css_class'=> array('allowed_types' => array('string')),
        'adapt_dropdown_css_class'=> array('allowed_types' => array('string')),
        'next_search_term'=> array('allowed_types' => array('string')),
        'plugin_rendered'=> array(
            'default' => 'plugin',
            'allowed_types' => array('string'),
            'allowed_value' => array('plugin', 'none'),
        ),
    );

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\Select2Extension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\AbstractPluginExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('choice');
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
