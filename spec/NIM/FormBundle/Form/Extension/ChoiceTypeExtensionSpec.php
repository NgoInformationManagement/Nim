<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Form\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChoiceTypeExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\ChoiceTypeExtension');
    }

    function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
    }

    function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('choice');
    }

    function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'render_type', 'render_options'
        ))->shouldBeCalled();

        $resolver->setDefaults(array(
            'render_type' => 'none',
            'render_options' => array(),
        ))->shouldBeCalled();

        $resolver->setAllowedValues(array(
            'render_type' => array('none', 'select2')
        ))->shouldBeCalled();

        $resolver->setAllowedTypes(array(
            'render_type' => 'string',
            'render_options' => 'array',
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array());
    }
}
