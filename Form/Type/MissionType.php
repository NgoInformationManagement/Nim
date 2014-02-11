<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace  NIM\MissionBundle\Form\Type;

use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\Form\FormBuilderInterface;

class MissionType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo', array(
                'label' => false,
                'translatable_class' => 'NIM\MissionBundle\Model\Mission',
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
            ->add('workers', 'nim_entity_worker')
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
