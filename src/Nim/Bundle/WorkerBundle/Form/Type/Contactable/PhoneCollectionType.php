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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhoneCollectionType extends AbstractType
{
    /**
     * @var string[]
     */
    protected $validationGroups = array();

    /**
     * @param string[] $validationGroups
     */
    public function __construct(array $validationGroups = array())
    {
        $this->validationGroups = $validationGroups;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'type' => 'nim_phone',
            'label' => 'worker.field.phone.label',
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
            'validation_groups' => $this->validationGroups,
            'attr' => array(
                'class' => 'form-inline',
            ),
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
        return 'nim_phone_collection';
    }
}
