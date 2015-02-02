<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\ThemeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\SecurityContextInterface;

abstract class AbstractMenuBuilder
{
    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var SecurityContextInterface
     */
    protected $securityContex;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(
        FactoryInterface $factory,
        SecurityContextInterface $securityContex,
        RequestStack $requestStack
    ) {
        $this->factory = $factory;
        $this->securityContex = $securityContex;
        $this->requestStack = $requestStack;
    }

    /**
     * @return ItemInterface
     */
    abstract public function createMainMenu();

    /**
     * @return ItemInterface
     */
    abstract public function createUserMenu();

    /**
     * @param string $code
     * @param array $option
     *
     * @return ItemInterface
     */
    protected function createRootMenu($code, array $option = [])
    {
        $options = array_merge([
            'class' => 'nav navbar-nav',
            'role' => 'menu'
        ], $option);

        $menu = $this->factory->createItem($code, [
            'childrenAttributes' => $options,
        ]);

        $menu->setCurrent($this->requestStack->getCurrentRequest()->getRequestUri());

        return $menu;
    }

    /**
     * @param ItemInterface $menu
     * @param string $name
     * @param string $route
     * @param string $icon
     *
     * @return ItemInterface
     */
    protected function addChild(ItemInterface $menu, $name, $route, $icon)
    {
        return $menu->addChild($name, [
            'route' => $route,
            'extras' => [
                'icon' => $icon
            ]
        ]);
    }
}