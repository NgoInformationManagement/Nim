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
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Select2ExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Extension\Plugin\Select2Extension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Extension\Plugin\AbstractPluginExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('choice');
    }

    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'plugin_rendered' => 'plugin',
            'width'=> 'element',
            'get_from_factory' => array(),
        ));

        $resolver->setOptional(array(
            'width',
            'load_more_padding',
            'close_on_select',
            'open_on_enter',
            'container_css',
            'dropdown_css',
            'container_css_class',
            'dropdown_css_class',
            'format_result',
            'format_selection',
            'sort_results',
            'format_result_css_class',
            'format_selection_css_class',
            'format_no_matches',
            'format_input_too_short',
            'format_input_too_long',
            'format_selection_too_big',
            'format_load_more',
            'format_searching',
            'minimum_results_for_search',
            'minimum_input_length',
            'maximum_input_length',
            'maximum_selection_size',
            'id',
            'matcher',
            'separator',
            'token_separators',
            'tokenizer',
            'escape_markup',
            'blur_on_change',
            'select_on_blur',
            'adapt_container_css_class',
            'adapt_dropdown_css_class',
            'next_search_term',
            'plugin_rendered',
            'get_from_factory',
        ));
        $resolver->setAllowedValues(array(
            'plugin_rendered'=> array('plugin', 'none'),
        ));

        $resolver->setAllowedTypes(array(
            'width'=> array('string'),
            'load_more_padding'=> array('integer'),
            'close_on_select'=> array('bool'),
            'open_on_enter'=> array('bool'),
            'container_css'=> array('string'),
            'dropdown_css'=> array('string'),
            'container_css_class'=> array('string'),
            'dropdown_css_class'=> array('string'),
            'format_result'=> array('string'),
            'format_selection'=> array('string'),
            'sort_results'=> array('string'),
            'format_result_css_class'=> array('string'),
            'format_selection_css_class'=> array('string'),
            'format_no_matches'=> array('string'),
            'format_input_too_short'=> array('string'),
            'format_input_too_long'=> array('string'),
            'format_selection_too_big'=> array('string'),
            'format_load_more'=> array('string'),
            'format_searching'=> array('string'),
            'minimum_results_for_search'=> array('integer'),
            'minimum_input_length'=> array('integer'),
            'maximum_input_length'=> array('integer'),
            'maximum_selection_size'=> array('integer'),
            'id'=> array('string'),
            'matcher'=> array('string'),
            'separator'=> array('string'),
            'token_separators'=> array('array'),
            'tokenizer'=> array('string'),
            'escape_markup'=> array('string'),
            'blur_on_change'=> array('bool'),
            'select_on_blur'=> array('bool'),
            'adapt_container_css_class'=> array('string'),
            'adapt_dropdown_css_class'=> array('string'),
            'next_search_term'=> array('string'),
            'plugin_rendered'=> array('plugin', 'none'),
        ));

        $this->setDefaultOptions($resolver);
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array());
    }
}
