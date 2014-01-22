<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form;

use Symfony\Component\Form\FormView;

trait FormToolsTrait
{
    /**
     * Assign HTML data attribute to the formView form $options
     *
     * @param FormView $view
     * @param array    $options
     * @param $optionName
     * @param null $prefix
     */
    private function addDataAttributeToFormViewFromOptions(FormView $view, array $options, $optionName, $prefix = null)
    {
        if (array_key_exists($optionName, $options)) {
            $newName = str_replace('_', '-', $optionName);

            if (null !== $prefix) {
                $newName = $prefix . $newName;
            }

            $this->addDataAttributeToFormView($view, $newName, $options[$optionName], $prefix);
        }
    }

    /**
     * Assign var to the formView form $options
     *
     * @param FormView $view
     * @param array    $formOptions
     * @param $optionName
     */
    private function addVarToFormViewFromOptions(FormView $view, array $formOptions, $optionName)
    {
        if (array_key_exists($optionName, $formOptions)) {
            $view->vars[$optionName] = $formOptions[$optionName];
        }
    }

    /**
     * Assign HTML data attribute to the formView
     *
     * @param FormView $view
     * @param $optionName
     * @param $value
     */
    private function addDataAttributeToFormView(FormView $view, $optionName, $value)
    {
        // It only manage simple array...
        if (is_array($value)) {
            $value = '['. implode(',', $value) .']';
        }

        $view->vars['attr']['data-' . $optionName] = $value;
    }

    /**
     * Assign var to the formView
     *
     * @param FormView $view
     * @param $optionName
     * @param $value
     */
    private function addVarToFormView(FormView $view, $optionName, $value)
    {
        $view->vars[$optionName] = $value;
    }
}
