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

use Nim\Bundle\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkerEntityType extends ResourceBaseType
{
    /**
     * @var string
     */
    private $workerModel;

    public function __construct($workerModel)
    {
        $this->workerModel = $workerModel;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'class' => $this->workerModel,
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
        return 'nim_entity_worker';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'entity';
    }
}
