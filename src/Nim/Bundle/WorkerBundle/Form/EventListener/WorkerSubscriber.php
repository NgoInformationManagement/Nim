<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class WorkerSubscriber implements EventSubscriberInterface
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
                'item_by_line' => 2,
            ));
        }
    }
}
