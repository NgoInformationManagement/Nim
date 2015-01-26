<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Form\Type;

use Nim\Bundle\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label' => 'contact.field.firstname.label',
            ))
            ->add('lastname', null, array(
                'label' => 'contact.field.lastname.label',
            ))
            ->add('street', null, array(
                'label' => 'contact.field.street.label',
            ))
            ->add('postcode', null, array(
                'label' => 'contact.field.postcode.label',
            ))
            ->add('city', null, array(
                'label' => 'contact.field.city.label',
            ))
            ->add('country', 'country', array(
                'label' => 'contact.field.country.label',
            ))
            ->add('emails', 'collection', array(
                'type' => 'nim_contactable_email',
                'label' => 'contact.field.email.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false
            ))
            ->add('phones', 'collection', array(
                'type' => 'nim_contactable_phone',
                'attr' => array('class' => 'form-inline'),
                'label' => 'contact.field.phone.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_contact';
    }
}
