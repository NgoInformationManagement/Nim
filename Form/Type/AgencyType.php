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
            ->add('city', null, array(
                'label' => 'agency.field.city.label',
            ))
            ->add('postcode', null, array(
                'label' => 'agency.field.postcode.label',
            ))
            ->add('country', 'country', array(
                'label' => 'agency.field.country.label',
            ))
            ->add('phoneNumber', null, array(
                'label' => 'agency.field.phoneNumber.label',
            ))
            ->add('fax', null, array(
                'label' => 'agency.field.fax.label',
            ))
            ->add('email', 'email', array(
                'label' => 'agency.field.email.label',
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
