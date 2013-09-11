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

use NIM\Component\Form\Type\NIMType;
use Symfony\Component\Form\FormBuilderInterface;

class MissionType extends NIMType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo', array(
                'label' => 'internationalization.label',
                'translatable_class' => 'NIM\MissionBundle\Model\Mission',
                'fields' => array(
                    'title' => array(
                        'label' => 'mission.field.title.label',
                    ),
                    'description' => array(
                        'label' => 'mission.field.description.label',
                        'type' => 'textarea',
                    ),
                )
            ))
            ->add('country', 'country', array(
                'label' => 'mission.field.country.label'
            ))
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
