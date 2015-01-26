<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\FormBundle\Form\Core;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class ResourceBaseType extends AbstractType
{
    /**
     * @var string
     */
    protected $dataClass = null;

    /**
     * @var array
     */
    protected $validationGroups = array();

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $options = array();
        if (null !== $this->dataClass) {
            $options['data_class'] = $this->dataClass;
        }

        if (0 < count($this->validationGroups)) {
            $options['validation_groups'] = $this->validationGroups;
        }

        $resolver->setDefaults($options);
    }

    /**
     * Set the data class
     *
     * @param $dataClass
     * @return $this
     */
    public function setDataClass($dataClass)
    {
        $this->dataClass = $dataClass;

        return $this;
    }

    /**
     * Set the validation groups
     *
     * @param $validationGroups
     */
    public function setValidationGroups(array $validationGroups)
    {
        $this->validationGroups = $validationGroups;
    }
}
