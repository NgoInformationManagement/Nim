<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle\Form\Type;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LocaleType extends AbstractType
{
    /**
     * @var array
     */
    private $locales;

    /**
     * @var
     */
    private $session;

    public function __construct(array $locales, SessionInterface $session)
    {
        $this->locales = $locales;
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = array())
    {
        $builder
            ->add('locale', 'choice',  array(
                'choices' => array_combine($this->locales, $this->locales),
                'label' => false
            ))
            ->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
                $locale = $this->session->get('_locale');
                $event->getForm()->get('locale')->setData($locale);
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_locale';
    }

}
