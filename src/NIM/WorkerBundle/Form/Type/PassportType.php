<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Form\Type;

use NIM\FormBundle\Form\Core\ResourceBaseType;
use Symfony\Component\Form\FormBuilderInterface;

class PassportType extends ResourceBaseType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', 'country', array(
                'label' => 'passport.field.country.label',

            ))
            ->add('number', null, array(
                'label' => 'passport.field.number.label',

            ))
            ->add('dateOfIssue', 'date', array(
                'label' => 'passport.field.dateOfIssue.label',

            ))
            ->add('dateOfExpiry', 'date', array(
                'label' => 'passport.field.dateOfExpiry.label',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_passport';
    }
}
