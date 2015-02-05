<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace  Nim\Bundle\WorkerBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkerEntityType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'class' => $this->dataClass,
            'expanded' => true,
            'multiple' => true,
            'property' => 'EntityFormTypeData'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_worker_entity';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'entity';
    }
}
