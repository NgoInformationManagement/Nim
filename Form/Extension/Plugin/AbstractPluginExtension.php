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

    protected $defaults = array();
    protected $optional = array();
    protected $defaultsValues = array();
    protected $defaultsTypes = array();

    /** @var OptionTransformer $optionTransformer */
    protected $optionTransformer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parseOptions();
        $this->optionTransformer = (new OptionTransformer())
            ->setConfiguration($this->getFullOptions());
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('plugin_rendered', $options) && $options['plugin_rendered'] != 'none') {
            $pluginOptions = $this->optionTransformer->setOptions($options)->transform();

            $this->addVarToFormView($view, 'plugin_rendered', $options['plugin_rendered']);
            $this->addVarToFormView($view, 'plugin_prototype', $this->getPrototypeName());
            $this->addVarToFormView($view, 'plugin_options', $pluginOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional($this->optional);
        $resolver->setDefaults($this->defaults);
        $resolver->setAllowedTypes($this->defaultsTypes);
        $resolver->setAllowedValues($this->defaultsValues);
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
    abstract protected function getOptions();

    /**
     * Extract the default values, allowed types, allowed values and optional configuration options
     * from the configuration
     */
    protected function parseOptions()
    {
        foreach ($this->getFullOptions() as $optionName => $option) {
            if (isset($option['allowed_values'])) {
                $this->defaultsValues[$optionName] = $option['allowed_values'];
            }

            if (isset($option['allowed_types'])) {
                $this->defaultsTypes[$optionName] = $option['allowed_types'];
            }

            if (isset($option['default'])) {
                $this->defaults[$optionName] = $option['default'];
            }
        }

        $this->optional = array_keys($this->getFullOptions());
    }

    /**
     * Get the full options
     *
     * @return array
     */
    protected function getFullOptions()
    {
        return array_merge(
            array(
                'plugin_rendered' => array(
                    'default' => 'plugin',
                    'allowed_types' => array('string'),
                    'allowed_value' => array('plugin', 'none'),
                    'excluded' => true,
                ),
                'get_from_factory' => array(
                    'default' => array(),
                    'allowed_types' => array('array'),
                    'excluded' => true,
                )
            ),
            $this->getOptions()
        );
    }
}
