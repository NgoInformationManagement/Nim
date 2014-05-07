<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Extension\Plugin;

class Select2Extension extends AbstractPluginExtension
{
    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    protected function getPrototypeName()
    {
        return 'select2';
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptions()
    {
        return array(
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
        );
    }
}
