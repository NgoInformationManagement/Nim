<?php

namespace Nim\Bundle\ThemeBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CollectionExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('item_by_line', $options)) {
            $view->vars['item_by_line'] = $options['item_by_line'];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'item_by_line',
        ));

        $resolver->setAllowedTypes(array(
            'item_by_line' => array('integer'),
        ));

        $resolver->setDefaults(array(
            'item_by_line' => 1,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return 'collection';
    }
}
