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

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChoiceTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('render_type', $options)) {
            if ($options['render_type'] != 'none') {
                $view->vars['attr']['data-form-type'] = 'choice';
                $view->vars['attr']['data-form-render-type'] = $options['render_type'];

                if (array_key_exists('render_options', $options)
                    && is_array($options['render_options'])) {
                    foreach($options['render_options'] as $key => $value) {
                        if (false === strpos($key, '-') &&
                            false !== preg_match_all('/((?:^|[A-Z])[a-z]+)/', $key, $matches)) {
                            $key = implode('-', $matches[0]);
                        }

                        $view->vars['attr']['data-' . $key] = $value;
                    }
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'render_type',
            'render_options',
        ));

        $resolver->setAllowedValues(array(
            'render_type' => array('none', 'select2')
        ));

        $resolver->setAllowedTypes(array(
            'render_type' => 'string',
            'render_options' => 'array',
        ));

        $resolver->setDefaults(array(
            'render_type' => 'none',
            'render_options' => array(),
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
