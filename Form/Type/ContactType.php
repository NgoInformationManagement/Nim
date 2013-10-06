<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Form\Type;

use NIM\Component\Form\Type\NIMType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends NIMType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array(
                'label' => 'contact.field.fistname.label',
            ))
            ->add('lastname', null, array(
                'label' => 'contact.field.lastname.label',
            ))
            ->add('street', null, array(
                'label' => 'contact.field.street.label',
            ))
            ->add('city', null, array(
                'label' => 'contact.field.city.label',
            ))
            ->add('postcode', null, array(
                'label' => 'contact.field.postcode.label',
            ))
            ->add('country', 'country', array(
                'label' => 'contact.field.country.label',
            ))
            ->add('emails', 'collection', array(
                'type' => 'nim.form.type.contactable.email',
                'label' => 'contact.field.email.label',
            ))
            ->add('phones', 'collection', array(
                'type' => 'nim.form.type.contactable.phone',
                'label' => 'contact.field.phone.label',
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
