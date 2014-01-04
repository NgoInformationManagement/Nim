<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Extension\Type;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'placeholder'
        ));

        $resolver->setAllowedTypes(array(
            'placeholder' => array('string'),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('placeholder', $options) && 'none' == $options['placeholder']) {
            return;
        }

        if (array_key_exists('widget', $options) && 'single_text' == $options['widget']) {
            $view->vars['attr']['placeholder'] = $this->getFormat($options);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'date';
    }

    /**
     * Return the date format
     *
     * @param $options
     * @return null
     */
    private function getFormat($options)
    {
        if (isset($options['placeholder'])) {
            return $options['placeholder'];
        }

        if (isset($options['format'])) {
            return $options['format'];
        }

        return null;
    }
}
