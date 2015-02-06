<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\VaccineBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class VaccineType extends AbstractResourceType
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
                        'label' => 'vaccine.field.title.label',
                    ),
                    'description' => array(
                        'label' => 'vaccine.field.description.label',
                        'field_type' => 'textarea',
                    ),
                ),
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_vaccine';
    }
}
