<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\CoreBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LocaleTypeSpec extends ObjectBehavior
{
    public function let(SessionInterface $session)
    {
        $this->beConstructedWith(array('en', 'fr'), $session);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\CoreBundle\Form\Type\LocaleType');
    }

    public function it_should_build_locale_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('locale', 'choice',  array(
                'choices' => array('en' => 'en', 'fr' => 'fr'),
                'label' => false
            ))
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $builder
            ->addEventListener(FormEvents::POST_SET_DATA, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_locale');
    }
}
