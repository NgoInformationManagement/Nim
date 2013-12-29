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
     * @param FormView $view
     * @param array    $formOptions
     * @param $optionName
     * @param null $prefix
     */
    private function addDataAttributeToFormViewFromOptions(FormView $view, array $formOptions, $optionName, $prefix = null)
    {
        if (array_key_exists($optionName, $formOptions)) {
            $newName = str_replace('_', '-', $optionName);

            if (null !== $prefix) {
                $newName = $prefix . $newName;
            }

            $this->addDataAttributeToFormView($view, $newName, $formOptions[$optionName], $prefix);
        }
    }

    /**
     * @param FormView $view
     * @param array    $formOptions
     * @param $optionName
     */
    private function addAttributeToFormViewFromOptions(FormView $view, array $formOptions, $optionName)
    {
        if (array_key_exists($optionName, $formOptions)) {
            $view->vars[$optionName] = $formOptions[$optionName];
        }
    }

    /**
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
     * @param FormView $view
     * @param $optionName
     * @param $value
     */
    private function addAttributeToFormView(FormView $view, $optionName, $value)
    {
        $view->vars[$optionName] = $value;
    }
}
