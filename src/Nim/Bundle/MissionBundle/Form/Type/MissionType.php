<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace  Nim\Bundle\MissionBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class MissionType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo', array(
                'label' => false,
                'translatable_class' => $this->dataClass,
                'fields' => array(
                    'title' => array(
                        'label' => 'mission.field.title.label',
                    ),
                    'description' => array(
                        'label' => 'mission.field.description.label',
                        'field_type' => 'textarea',
                    ),
                )
            ))
            ->add('country', 'country', array(
                'label' => 'mission.field.country.label',
            ))
            ->add('startedAt', 'date', array(
                'label' => 'mission.field.startedAt.label',
                'widget' => 'single_text',
                'leading_zero' => true,

            ))
            ->add('endedAt', 'date', array(
                'widget' => 'single_text',
                'label' => 'mission.field.endedAt.label',
                'leading_zero' => true,
            ))
            ->add('workers', 'nim_worker_entity')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_mission';
    }
}
