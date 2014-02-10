<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Form\Type\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class WorkerSubcriber implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    /**
     * {@inheritdoc}
     */
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if ($data && $data->getId()) {
            $form->add('contacts', 'collection', array(
                'type' => 'nim_contact',
                'label' => 'worker.field.contact.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
                'item_by_line' => 2
            ))
            ->add('missions', 'nim_entity_mission', array(
                'label' => 'worker.field.mission.label',
                'property' => 'EntityFormTypeData'
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
            ));
        }
    }
}
