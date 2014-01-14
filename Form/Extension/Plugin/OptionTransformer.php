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

class OptionTransformer
{
    private $options = array();
    private $configuration = array();

    /**
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param $configuration
     * @return $this
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Generate javascript plugin options
     *
     * @return string
     */
    public function transform()
    {
        $formatedOptions = '';
        foreach ($this->options as $optionName => $config) {
            if (isset($this->configuration[$optionName]) && !$this->isExcludedOption($optionName)) {
                $formatedOptions .= $this->encodeOption($optionName);
            }
        }

        return sprintf('{%s}', trim($formatedOptions, ','));
    }

    /**
     * Format the plugin option
     *
     * @param  string      $optionName
     * @return null|string
     */
    private function encodeOption($optionName)
    {
        if (isset($this->options['get_from_factory']) &&
            is_array($this->options['get_from_factory']) &&
            in_array($optionName, $this->options['get_from_factory'])) {
            return sprintf(
                '"%s":$.PluginOptionsFactory.get("%s"),',
                $this->getOptionName($optionName),
                $this->options[$optionName]
            );
        } else {
            return sprintf(
                '"%s":"%s",',
                $this->getOptionName($optionName),
                $this->options[$optionName]
            );
        }
    }

    /**
     * Get the camel case option name.
     *
     * @param $name
     * @return string
     */
    private function getOptionName($name)
    {
        if (false !== strpos($name , '_')) {
            $name = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $name))));
        }

        return $name;
    }
//
//    /**
//     * Check if option exists
//     *
//     * @param $optionName
//     * @return bool
//     */
//    private function isExistingOption($optionName)
//    {
//        return isset($this->options[$optionName]);
//    }

    /**
     * Check if option is excluded
     *
     * @param $optionName
     * @return bool
     */
    private function isExcludedOption($optionName)
    {
        return isset($this->configuration[$optionName]['excluded']) ? $this->configuration[$optionName]['excluded'] : false;
    }
}
