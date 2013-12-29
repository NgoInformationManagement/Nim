<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Form\Type;

use PhpSpec\ObjectBehavior;

class GenderTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Type\GenderType');
    }

    public function it_should_extends_symfony_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_should_have_button_as_parent()
    {
        $this->getParent()->shouldReturn('choice');
    }

    public function it_should_have_delete_as_name()
    {
        $this->getName()->shouldReturn('gender');
    }
}
