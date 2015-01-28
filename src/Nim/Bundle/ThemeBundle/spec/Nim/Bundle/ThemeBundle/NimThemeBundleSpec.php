<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\ThemeBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NimThemeBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\ThemeBundle\NimThemeBundle');
    }

    function it_is_bundle()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\Bundle\Bundle');
    }
}
