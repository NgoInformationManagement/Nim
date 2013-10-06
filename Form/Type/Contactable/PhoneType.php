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

use NIM\Component\Form\Type\NIMType;
use NIM\WorkerBundle\Model\Entity\EntityAbstract;
use Symfony\Component\Form\FormBuilderInterface;

class PhoneType extends NIMType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array(
                'choices' => EntityAbstract::getPhoneTypes('contactable.field.type'),
                'label' => 'contactable.field.type.label',
            ))
            ->add('number', null, array(
                'label' => 'contactable.field.number.label',
            ))
        ;
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_contactable_phone';
    }
}
