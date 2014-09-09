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

class MjolnicColorpickerExtension extends AbstractPluginExtension
{
    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'colorpicker';
    }

    /**
     * {@inheritdoc}
     */
    protected function getPrototypeName()
    {
        return 'colorpicker';
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptions()
    {
        return array(
            'format' =>  array(
                'allowed_types' => array('string'),
                'allowed_value' => array('hex', 'rgb', 'rgba', 'hsl', 'hsla'),
            ),
            'color' => array('allowed_types' => array('string')),
            'container' => array('allowed_types' => array('string')),
            'component' => array('allowed_types' => array('string')),
            'input' => array('allowed_types' => array('string')),
            'horizontal' => array('allowed_types' => array('bool')),
            'template' => array('allowed_types' => array('string')),
        );
    }
}
