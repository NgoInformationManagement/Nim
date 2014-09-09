<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Form\Type\Contactable;

use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailCollectionType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'type' => 'nim_contactable_email',
            'label' => 'worker.field.email.label',
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
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
        return 'nim_contactable_collection_email';
    }
}
