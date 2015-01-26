<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Form\Type\Contactable;

use Nim\Bundle\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhoneCollectionType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'type' => 'nim_contactable_phone',
            'label' => 'worker.field.phone.label',
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
            'attr' => array(
                'class' => 'form-inline'
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_contactable_collection_phone';
    }
}
