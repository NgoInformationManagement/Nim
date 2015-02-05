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

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Nim\Bundle\WorkerBundle\Form\EventListener\WorkerSubscriber;
use Nim\Bundle\WorkerBundle\Model\Worker\WorkerTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;

class WorkerType extends AbstractResourceType
{
    /**
     * @var WorkerSubscriber
     */
    private $workerSubscriber;

    public function __construct($dataClass, array $validationGroups = array(), WorkerSubscriber $workerSubscriber)
    {
        parent::__construct($dataClass, $validationGroups);

        $this->workerSubscriber = $workerSubscriber;
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
                'class' => 'Nim\Bundle\WorkerBundle\Model\Agency',
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
            ->add('emails', 'nim_email_collection', array(
                'label' => 'worker.field.email.label',
            ))
            ->add('phones', 'nim_phone_collection', array(
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

            $builder->addEventSubscriber($this->workerSubscriber);
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
