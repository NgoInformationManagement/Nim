<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Extension;

use NIM\FormBundle\Form\FormToolsTrait;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Select2Extension extends AbstractTypeExtension
{
    use FormToolsTrait;

    const JQUERY_PROTOTYPE_NAME = 'select2';

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $this->addDataAttributeToFormView($view, 'plugin-name', self::JQUERY_PROTOTYPE_NAME);

        $this->addDataAttributeToFormViewFromOptions($view, $options, 'width');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'load_more_padding');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'close_on_select');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'open_on_enter');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'container_css');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'dropdown_css');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'container_css_class');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'dropdown_css_class');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_result');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_selection');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'sort_results');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_result_css_class');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_selection_css_class');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_no_matches');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_input_too_short');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_input_too_long');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_selection_too_big');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_load_more');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'format_searching');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'minimum_results_for_search');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'minimum_input_length');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'maximum_input_length');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'maximum_selection_size');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'id');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'matcher');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'separator');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'token_separators');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'tokenizer');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'escape_markup');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'blur_on_change');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'select_on_blur');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'adapt_container_css_class');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'adapt_dropdown_css_class');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'next_search_term');

    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
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
            'next_search_term'
        ));

        $resolver->setAllowedTypes(array(
            'width' => array('string'),
            'load_more_padding' => array('integer'),
            'close_on_select' => array('bool'),
            'open_on_enter' => array('bool'),
            'container_css' => array('string'),
            'dropdown_css' => array('string'),
            'container_css_class' => array('string'),
            'dropdown_css_class' => array('string'),
            'format_result' => array('string'),
            'format_selection' => array('string'),
            'sort_results' => array('string'),
            'format_result_css_class' => array('string'),
            'format_selection_css_class' => array('string'),
            'format_no_matches' => array('string'),
            'format_input_too_short' => array('string'),
            'format_input_too_long' => array('string'),
            'format_selection_too_big' => array('string'),
            'format_load_more' => array('string'),
            'format_searching' => array('string'),
            'minimum_results_for_search' => array('integer'),
            'minimum_input_length' => array('integer'),
            'maximum_input_length' => array('integer'),
            'maximum_selection_size' => array('integer'),
            'id' => array('string'),
            'matcher' => array('string'),
            'separator' => array('string'),
            'token_separators' => array('array'),
            'tokenizer' => array('string'),
            'escape_markup' => array('string'),
            'blur_on_change' => array('bool'),
            'select_on_blur' => array('bool'),
            'adapt_container_css_class' => array('string'),
            'adapt_dropdown_css_class' => array('string'),
            'next_search_term' => array('string')
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'choice';
    }
}
