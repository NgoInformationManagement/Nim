<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle\Form\EventListener;

use NIM\WorkerBundle\Form\EventListener\WorkerSubscriber as BaseSubscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class WorkerSubscriber extends BaseSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function preSetData(FormEvent $event)
    {
        parent::preSetData($event);

        $data = $event->getData();
        $form = $event->getForm();

        if ($data && $data->getId()) {
            $form->add('missions', 'nim_entity_mission', array(
                'label' => 'worker.field.mission.label',
            ))
            ->add('passports', 'collection', array(
                'type' => 'nim_passport',
                'label' => 'worker.field.passport.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
                'item_by_line' => 2
            ))
            ->add('visas', 'collection', array(
                'type' => 'nim_visa',
                'label' => 'worker.field.visa.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
                'item_by_line' => 2
            ))
            ->add('vaccines', 'nim_entity_vaccine', array(
                'label' => 'worker.field.vaccine.label',
            ));
        }
    }
}
