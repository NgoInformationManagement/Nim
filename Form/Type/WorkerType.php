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

use NIM\FormBundle\Form\Core\ResourceBaseType;
use NIM\WorkerBundle\Form\Type\EventListener\WorkerSubcriber;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\CountryTypeTest;

class WorkerType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function __construct($dataClass, array $validationGroups)
    {
        parent::__construct($dataClass, $validationGroups);

        $this->validationGroups = function(FormInterface $form) use ($validationGroups) {
            $data = $form->getData();
            if ($data && $data->getId()) {
                return array_map(function($value) {
                    return $value. '-update';
                }, $validationGroups);
            } else {
                return $validationGroups;
            };
        };
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'gender', array(
                'label' => 'worker.field.gender.label',
            ))
            ->add('firstname', null, array(
                'label' => 'worker.field.firstname.label',
            ))
            ->add('lastname', null, array(
                'label' => 'worker.field.lastname.label',
            ))
            ->add('basedAt', 'entity', array(
                'label' => 'worker.field.basedAt.label',
                'class' => 'NIM\\WorkerBundle\\Model\\Agency',
                'property' => 'name',
            ))
            ->add('street', null, array(
                'label' => 'worker.field.street.label',
            ))
            ->add('postcode', null, array(
                'label' => 'worker.field.postcode.label',
            ))
            ->add('city', null, array(
                'label' => 'worker.field.city.label',
            ))
            ->add('country', 'country', array(
                'label' => 'worker.field.country.label',
            ))
            ->add('emails', 'collection', array(
                'type' => 'nim_contactable_email',
                'label' => 'worker.field.email.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
            ))
            ->add('phones', 'collection', array(
                'type' => 'nim_contactable_phone',
                'label' => 'worker.field.phone.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
            ))
            ->add('birthday', 'birthday', array(
                'label' => 'worker.field.birthday.label',
                'widget' => 'single_text',
            ))
            ->add('diploma', null, array(
                'label' => 'worker.field.diploma.label',
            ))
            ->add('function', null, array(
                'label' => 'worker.field.function.label',
            ))
            ->add('arrivedAt', 'date', array(
                'label' => 'worker.field.arrivedAt.label',
                'widget' => 'single_text',
            ))
            ->add('leftAt', 'date', array(
                'label' => 'worker.field.leftAt.label',
                'widget' => 'single_text',
            ));

            $builder->addEventSubscriber(new WorkerSubcriber());

//            ->add('nationalities', 'collection', array(
//                'type' => new CountryType(),
//                'label' => 'worker.field.nationalities.label',
//                'allow_add' => true,
//                'allow_delete' => true
//            ))
        ;
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_worker';
    }
}
