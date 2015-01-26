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
use Nim\Bundle\WorkerBundle\Model\Contactable\PhoneTypes;
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
                'choices' => \Nim\Bundle\WorkerBundle\Model\Contactable\PhoneTypes::getTypes('phone.field.type.option'),
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
