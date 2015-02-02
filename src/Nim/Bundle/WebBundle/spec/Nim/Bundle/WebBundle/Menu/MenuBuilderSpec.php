<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WebBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\TranslatorInterface;

class MenuBuilderSpec extends ObjectBehavior
{
    function let(FactoryInterface $factory, TranslatorInterface $translator)
    {
        $this->beConstructedWith($factory, $translator);
    }

    function it_is_menu_builder()
    {
        $this->shouldImplement('Nim\Bundle\ThemeBundle\Menu\MenuBuilderInterface');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WebBundle\Menu\MenuBuilder');
    }

    function it_build_menu($factory, ItemInterface $itemMenu, RequestStack $requestStack)
    {
        $factory->createItem('root')->willReturn($itemMenu);
        $itemMenu->addChild('login.welcome')->shouldBeCalled();

        $this->createMenu($requestStack)->shouldReturn($itemMenu);
    }
}
