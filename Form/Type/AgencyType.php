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

class AgencyType extends NIMType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'agency.field.name.label',
            ))
            ->add('street', null, array(
                'label' => 'agency.field.street.label',
            ))
            ->add('postcode', null, array(
                'label' => 'agency.field.postcode.label',
            ))
            ->add('city', null, array(
                'label' => 'agency.field.city.label',
            ))
            ->add('country', 'country', array(
                'label' => 'agency.field.country.label',
            ))
            ->add('emails', 'collection', array(
                'type' => 'nim_contactable_email',
                'label' => 'agency.field.email.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false
            ))
            ->add('phones', 'collection', array(
                'type' => 'nim_contactable_phone',
                'label' => 'agency.field.phone.label',
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
        return 'nim_agency';
    }
}