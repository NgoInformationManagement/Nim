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

use Symfony\Component\Form\AbstractTypeExtension;
use NIM\FormBundle\Form\FormToolsTrait;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class AbstractPluginExtension extends AbstractTypeExtension
{
    use FormToolsTrait;

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('plugin_rendered', $options) && $options['plugin_rendered'] != 'none') {
            $this->addVarToFormView($view, 'plugin_rendered', $options['plugin_rendered']);
            $this->addDataAttributeToFormView($view, 'plugin-name', $this->getPrototypeName());

            $optional = array_keys($this->getPluginOptions());
            foreach ($optional as $option) {
                if (!in_array($options, $this->getExcludedOptions())) {
                    $this->addDataAttributeToFormViewFromOptions($view, $options, $option);
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array_keys($this->getPluginOptions()));

        foreach ($this->getPluginOptions() as $optionName => $options) {
            if (isset($options['allowed_values'])) {
                $resolver->addAllowedValues(array($optionName => $options['allowed_values']));
            }

            if (isset($options['allowed_types'])) {
                $resolver->addAllowedTypes(array($optionName => $options['allowed_types']));
            }

            if (isset($options['default'])) {
                $resolver->replaceDefaults(array($optionName => $options['default']));
            }
        }
    }

    /**
     * Return the jquery plugin property name
     *
     * @return mixed
     */
    abstract protected function getPrototypeName();

    /**
     * Return an array of form options
     * Example :
     * option_name:
     *      allowed_values
     *      allowed_types
     *      default
     *
     * @return mixed
     */
    abstract protected function getPluginOptions();

    /**
     * Return all the options which is not assigned to the view
     *
     * @return array
     */
    protected function getExcludedOptions()
    {
        return array('plugin_rendered');
    }
}
