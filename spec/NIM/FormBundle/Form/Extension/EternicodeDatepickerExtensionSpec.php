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

class EternicodeDatepickerExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\EternicodeDatepickerExtension');
    }

    function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
    }

    function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('date');
    }

    function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'autoclose',
            'before_show_day',
            'calendar_weeks',
            'clear_btn',
            'days_of_week_disabled',
            'end_date',
            'force_parse',
            'inputs',
            'keyboard_navigation',
            'language',
            'min_view_mode',
            'orientation',
            'start_date',
            'start_view',
            'today_btn',
            'today_highlight',
            'week_start'
        ))->shouldBeCalled();

        $resolver->setDefaults(Argument::type('array'))->shouldBeCalled();

        $resolver->setAllowedTypes(array(
            'autoclose' => array('bool'),
            'before_show_day' => array('string'),
            'calendar_weeks' => array('bool'),
            'clear_btn' => array('bool'),
            'days_of_week_disabled' => array('array'),
            'end_date' => array('string'),
            'force_parse' => array('bool'),
            'inputs' => array('array'),
            'keyboard_navigation' => array('bool'),
            'language' => array('string'),
            'min_view_mode' => array('string', 'integer'),
            'orientation' => array('string'),
            'start_date' => array('string'),
            'start_view' => array('string', 'integer'),
            'today_btn' => array('bool'),
            'today_highlight'  => array('bool'),
            'week_start' => array('integer')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array('format' => 'dd/mm/yyyy'));
    }
}
