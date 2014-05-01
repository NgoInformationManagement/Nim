<?php

namespace NIM\VaccineBundle\Form\Type;

use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\Form\FormBuilderInterface;

class VaccineType extends ResourceBaseType

{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo', array(
                'label' => false,
                'translatable_class' => 'NIM\VaccineBundle\Model\Vaccine',
                'fields' => array(
                    'title' => array(
                        'label' => 'vaccine.field.title.label',
                    ),
                    'description' => array(
                        'label' => 'vaccine.field.description.label',
                        'field_type' => 'textarea',
                    ),
                )
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
