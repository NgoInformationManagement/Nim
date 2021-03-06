<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\CoreBundle\Form\EventListener;

use Nim\Bundle\WorkerBundle\Form\EventListener\WorkerSubscriber as BaseSubscriber;
use Symfony\Component\Form\FormEvent;

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
            $form->add('missions', 'nim_mission_entity', array(
                'label' => 'worker.field.mission.label',
            ))
            ->add('passports', 'collection', array(
                'type' => 'nim_passport',
                'label' => 'worker.field.passport.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
                'item_by_line' => 2,
            ))
            ->add('visas', 'collection', array(
                'type' => 'nim_visa',
                'label' => 'worker.field.visa.label',
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
                'item_by_line' => 2,
            ))
            ->add('vaccines', 'nim_vaccine_entity', array(
                'label' => 'worker.field.vaccine.label',
            ));
        }
    }
}
