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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MissionEntityType extends ResourceBaseType
{
    /**
     * @var string
     */
    private $missionModel;

    public function __construct($missionModel)
    {
        $this->missionModel = $missionModel;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'class' => $this->missionModel,
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
        return 'nim_entity_mission';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'entity';
    }
}
