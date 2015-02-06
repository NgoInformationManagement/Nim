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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class MenuBuilderSpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $factory,
        SecurityContextInterface $securityContext,
        RequestStack $requestStack,
        Request $request
    ) {
        $requestStack->getCurrentRequest()->willReturn($request);
        $request->getRequestUri()->willReturn('my/uri');

        $this->beConstructedWith($factory, $securityContext, $requestStack);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WebBundle\Menu\MenuBuilder');
    }

    public function it_build_main_menu($factory, ItemInterface $itemMenu)
    {
        $factory->createItem('main_menu', Argument::type('array'))->willReturn($itemMenu);
        $itemMenu->setCurrent('my/uri')->shouldBeCalled();

        $itemMenu->addChild('menu.dashbord', Argument::type('array'))->shouldBeCalled();
        $itemMenu->addChild('menu.agency', Argument::type('array'))->shouldBeCalled();
        $itemMenu->addChild('menu.mission', Argument::type('array'))->shouldBeCalled();
        $itemMenu->addChild('menu.worker', Argument::type('array'))->shouldBeCalled();
        $itemMenu->addChild('menu.vaccine', Argument::type('array'))->shouldBeCalled();

        $this->createMainMenu()->shouldReturn($itemMenu);
    }

    public function it_build_user_menu(
        $factory,
        $securityContext,
        ItemInterface $itemMenu,
        TokenInterface $token,
        UserInterface $user
    ) {
        $securityContext->getToken()->willReturn($token);
        $token->getUser()->willReturn($user);

        $factory->createItem('user_menu', Argument::type('array'))->willReturn($itemMenu);
        $itemMenu->setCurrent('my/uri')->shouldBeCalled();

        $itemMenu->addChild($user, Argument::type('array'))->shouldBeCalled();
        $itemMenu->addChild('menu.logout', Argument::type('array'))->shouldBeCalled();

        $this->createUserMenu()->shouldReturn($itemMenu);
    }
}
