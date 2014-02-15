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

use Doctrine\ORM\EntityRepository;
use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\Form\FormBuilderInterface;

class AgencyType extends ResourceBaseType
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
            ->add('emails', 'nim_contactable_collection_email', array(
                'label' => 'agency.field.email.label',
            ))
            ->add('phones', 'nim_contactable_collection_phone', array(
                'label' => 'agency.field.phone.label',
            ))
            ->add('workers', 'nim_entity_worker', array(
                'query_builder' => function(EntityRepository $e) {
                    return $e->getBasedNoWhereQuery()
                    ;
                }
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
