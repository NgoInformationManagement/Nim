<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Type;

use NIM\FormBundle\Model\Gender;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GenderType extends AbstractType
{
    /**
     * @docInherit
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => Gender::getOptions('gender')
        ));
    }

    /**
     * @docInherit
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * @docInherit
     */
    public function getName()
    {
        return 'gender';
    }
}
