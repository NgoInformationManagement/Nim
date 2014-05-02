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
use NIM\WorkerBundle\Model\Core\Worker\WorkerTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;

class WorkerType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function setValidationGroups(array $validationGroups)
    {
        $this->validationGroups = function (FormInterface $form) use ($validationGroups) {
            $data = $form->getData();
            if ($data && $data->getId()) {
                return array_map(function ($value) {
                    return $value. '-update';
                }, $validationGroups);
            } else {
                return $validationGroups;
            }
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
            ->add('emails', 'nim_contactable_collection_email', array(
                'label' => 'worker.field.email.label',
            ))
            ->add('phones', 'nim_contactable_collection_phone', array(
                'label' => 'worker.field.phone.label',
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
            ))
            ->add('type', 'choice', array(
                'label' => 'worker.field.type.label',
                'choices' => WorkerTypes::getTypes('worker.field.type.option')
            ));

            $builder->addEventSubscriber(new WorkerSubcriber());
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
