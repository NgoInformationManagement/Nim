<?php

namespace NIM\VaccineBundle\Form\Type;

use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\Form\FormBuilderInterface;

class VaccineType extends ResourceBaseType
{
    /**
     * @var string
     */
    private $vaccineModel;

    public function __construct($vaccineModel)
    {
        $this->vaccineModel = $vaccineModel;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo', array(
                'label' => false,
                'translatable_class' => $this->vaccineModel,
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
