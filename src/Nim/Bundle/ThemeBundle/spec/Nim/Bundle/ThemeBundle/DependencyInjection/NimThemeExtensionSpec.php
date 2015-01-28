<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\ThemeBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NimThemeExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\ThemeBundle\DependencyInjection\NimThemeExtension');
    }

    function it_is_extension()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\DependencyInjection\Extension');
    }
}
