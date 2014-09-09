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
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MjolnicColorpickerExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\MjolnicColorpickerExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\Plugin\AbstractPluginExtension');
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('colorpicker');
    }

    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'plugin_rendered' => 'plugin',
            'get_from_factory' => array(),
        ));

        $resolver->setOptional(array(
            'format',
            'color',
            'component',
            'input',
            'horizontal',
            'template',
            'plugin_rendered',
            'get_from_factory',
        ));
        $resolver->setAllowedValues(array(
            'format' =>  array('hex', 'rgb', 'rgba', 'hsl', 'hsla'),
            'plugin_rendered'=> array('plugin', 'none'),
        ));

        $resolver->setAllowedTypes(array(
            'format' => array('string'),
            'color'=> array('string'),
            'container'=> array('string'),
            'component'=> array('string'),
            'input'=> array('string'),
            'horizontal'=> array('bool'),
            'template'=> array('string'),
            'plugin_rendered'=> array('string'),
        ));

        $this->setDefaultOptions($resolver);
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array());
    }
}
