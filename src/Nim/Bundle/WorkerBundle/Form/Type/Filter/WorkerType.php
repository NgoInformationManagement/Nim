<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Form\Type\Filter;

use Nim\Bundle\WorkerBundle\Model\Worker\WorkerTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', null, array(
                'label' => 'worker.field.name.label'
            ))
            ->add('type', 'choice', array(
                'label' => 'worker.field.type.label',
                'choices' => WorkerTypes::getTypes('worker.field.type.option')
            ))
            ->add('arrivedAt', 'date', array(
                'label' => 'worker.field.arrivedAt.label'
            ))
            ->add('basedAt', 'entity', array(
                'label' => 'worker.field.basedAt.label',
                'class' => 'Nim\Bundle\WorkerBundle\Model\Agency',
                'property' => 'name',
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_filter_worker';
    }
}
