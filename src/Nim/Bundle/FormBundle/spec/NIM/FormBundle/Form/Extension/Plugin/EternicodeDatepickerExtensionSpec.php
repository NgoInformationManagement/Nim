<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Form\Extension\Plugin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EternicodeDatepickerExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Extension\Plugin\EternicodeDatepickerExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Extension\Plugin\AbstractPluginExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('date');
    }

    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'plugin_rendered',
            'get_from_factory',
            'leading_zero',
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
            'today_btn' ,
            'today_highlight',
            'week_start',
        ));

        $resolver->setDefaults(array(
            'plugin_rendered' => 'plugin',
            'get_from_factory' => array(),
            'leading_zero' => false,
            'autoclose' => false,
            'format' => Argument::any(),
            'language' => \Locale::getDefault(),
            'widget' => 'single_text',
        ));

        $resolver->setAllowedTypes(array(
            'plugin_rendered' => array('plugin', 'none'),
            'leading_zero' => array('bool'),
            'autoclose' => array('bool'),
            'before_show_day'=> array('string'),
            'calendar_weeks'=> array('bool'),
            'clear_btn'=> array('bool'),
            'days_of_week_disabled'=> array('array'),
            'end_date'=> array('string'),
            'force_parse'=> array('bool'),
            'inputs'=> array('array'),
            'keyboard_navigation'=> array('bool'),
            'language'=> array('string'),
            'min_view_mode'=> array('string', 'integer'),
            'orientation'=> array('string'),
            'start_date'=> array('string'),
            'start_view'=> array('string', 'integer'),
            'today_btn'=> array('bool'),
            'today_highlight'=> array('bool'),
            'week_start'=> array('integer'),
        ));

        $resolver->setAllowedValues(array(
            'plugin_rendered' => array('plugin', 'none')
        ));

        $this->setDefaultOptions($resolver);
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array('format' => 'dd/mm/yyyy'));
    }
}
