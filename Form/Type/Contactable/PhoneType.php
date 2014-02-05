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
use NIM\WorkerBundle\Model\Core\Contactable\PhoneTypes;
use Symfony\Component\Form\FormBuilderInterface;

class PhoneType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array(
                'choices' => PhoneTypes::getTypes('phone.field.type.option'),
                'label' => false,
            ))
            ->add('number', null, array(
                'label' => false,
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
