<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace  NIM\VaccineBundle\Form\Type;

use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VaccineEntityType extends ResourceBaseType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'class' => 'NIM\VaccineBundle\Model\Vaccine',
            'expanded' => true,
            'multiple' => true,
            'property' => 'EntityFormTypeData',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_entity_vaccine';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'entity';
    }
}
