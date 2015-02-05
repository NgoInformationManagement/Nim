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

use Doctrine\ORM\EntityRepository;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Nim\Bundle\WorkerBundle\Repository\WorkerRepository;
use Symfony\Component\Form\FormBuilderInterface;

class AgencyType extends AbstractResourceType
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
            ->add('emails', 'nim_email_collection', array(
                'label' => 'agency.field.email.label',
            ))
            ->add('phones', 'nim_phone_collection', array(
                'label' => 'agency.field.phone.label',
            ))
            ->add('workers', 'nim_worker_entity', array(
                'query_builder' => function (EntityRepository $e) {
                    /** @var WorkerRepository $e */

                    return $e->getBasedNoWhereQuery();
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
