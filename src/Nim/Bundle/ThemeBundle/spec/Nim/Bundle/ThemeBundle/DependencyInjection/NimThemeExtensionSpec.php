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
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NimThemeExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\ThemeBundle\DependencyInjection\NimThemeExtension');
    }

    function it_is_extension()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\DependencyInjection\Extension');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface');
    }

    function it_sets_up_the_configuration(ContainerBuilder $container)
    {
        $container->getParameter('kernel.bundles')->willReturn([
            'TwigBundle' => '',
            'AsseticBundle' => '',
            'KnpMenuBundle' => ''
        ]);

        $container->prependExtensionConfig('twig', Argument::type('array'))->shouldBeCalled();
        $container->prependExtensionConfig('knp_menu', Argument::type('array'))->shouldBeCalled();
        $container->prependExtensionConfig('assetic', Argument::type('array'))->shouldBeCalled();

        $this->prepend($container);
    }
}
