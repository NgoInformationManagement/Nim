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
use Prophecy\Argument;

class DeleteTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Type\DeleteType');
    }

    function it_should_extends_symfony_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    function it_should_implements_button_type_interface()
    {
        $this->shouldHaveType('Symfony\Component\Form\ButtonTypeInterface');
    }

    function it_should_have_button_as_parent()
    {
        $this->getParent()->shouldReturn('button');
    }

    function it_should_have_delete_as_name()
    {
        $this->getName()->shouldReturn('delete');
    }
}
