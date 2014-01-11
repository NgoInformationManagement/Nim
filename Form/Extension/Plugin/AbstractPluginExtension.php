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

            $pluginOptions = array_keys($this->getPluginOptions());
            foreach ($pluginOptions as $optionName) {
                if (!in_array($options, $this->getExcludedOptions())) {
                    $prefix = $this->getPrefixOption($optionName);
                    $this->addDataAttributeToFormViewFromOptions($view, $options, $optionName, $prefix);
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $pluginOptions = $this->getPluginOptions();
        $pluginOptions['plugin_rendered'] = array(
            'default' => 'plugin',
            'allowed_types' => array('string'),
            'allowed_value' => array('plugin', 'none'),
        );

        $resolver->setOptional(array_keys($pluginOptions));

        foreach ($pluginOptions as $optionName => $option) {
            if (isset($option['allowed_values'])) {
                $resolver->addAllowedValues(array($optionName => $option['allowed_values']));
            }

            if (isset($option['allowed_types'])) {
                $resolver->addAllowedTypes(array($optionName => $option['allowed_types']));
            }

            if (isset($option['default'])) {
                $resolver->replaceDefaults(array($optionName => $option['default']));
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

    /**
     * Get the prefix a HTML data attribute
     *
     * @param $optionName
     * @return null
     */
    protected function getPrefixOption($optionName)
    {
        if (isset($this->getPluginOptions()[$optionName]['prefix'])) {
            return $this->getPluginOptions()[$optionName]['prefix'];
        }

        return null;
    }
}
