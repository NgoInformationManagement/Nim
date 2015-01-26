<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Form\Type;

use PhpSpec\ObjectBehavior;

class ColorPickerTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Type\ColorPickerType');
    }

    public function it_should_extends_symfony_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_should_have_text_as_parent()
    {
        $this->getParent()->shouldReturn('text');
    }

    public function it_should_have_colorpicker_as_name()
    {
        $this->getName()->shouldReturn('colorpicker');
    }
}
