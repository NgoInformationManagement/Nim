<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Form\Extension\Plugin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EternicodeDatepickerExtensionSpec extends ObjectBehavior
{
    private $options = array(
        'plugin_rendered'=> array(
            'default' => 'plugin',
            'allowed_types' => array('string'),
            'allowed_value' => array('plugin', 'none'),
        ),
        'autoclose' =>  array(
            'allowed_types' => array('bool'),
            'default' => true,
        ),
        'before_show_day' =>  array('allowed_types' => array('string')),
        'calendar_weeks' =>  array('allowed_types' => array('bool')),
        'clear_btn' =>  array('allowed_types' => array('bool')),
        'days_of_week_disabled' => array('allowed_types' => array('array')),
        'end_date' => array('allowed_types' => array('string')),
        'force_parse' => array('allowed_types' => array('bool')),
        'inputs' => array('allowed_types' => array('array')),
        'keyboard_navigation' => array('allowed_types' => array('bool')),
        'language' => array('allowed_types' => array('string')),
        'min_view_mode' => array('allowed_types' => array('string', 'integer')),
        'orientation' => array( 'allowed_types' => array('string'),),
        'start_date' => array('allowed_types' => array('string')),
        'start_view' => array('allowed_types' => array('string', 'integer')),
        'today_btn' => array('allowed_types' => array('bool')),
        'today_highlight' => array('allowed_types' => array('bool')),
        'week_start' => array('allowed_types' => array('integer')),
    );

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\EternicodeDatepickerExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\AbstractPluginExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('date');
    }

    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        foreach ($this->options as $optionName => $options) {
            if (isset($options['allowed_values'])) {
                $resolver->addAllowedValues(array($optionName => $options['allowed_values']))
                    ->shouldBeCalled();
            }

            if (isset($options['allowed_types'])) {
                $resolver->addAllowedTypes(array($optionName => $options['allowed_types']))
                    ->shouldBeCalled();
            }

            if (isset($options['default'])) {
                $resolver->replaceDefaults(array($optionName => $options['default']))
                    ->shouldBeCalled();
            }
        }

        $resolver->setOptional(array_keys($this->options))
            ->shouldBeCalled();

        $resolver->setDefaults(Argument::type('array'))
            ->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array('format' => 'dd/mm/yyyy'));
    }
}
