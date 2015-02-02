<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WebBundle\Menu;

use Symfony\Component\HttpFoundation\RequestStack;
use Nim\Bundle\ThemeBundle\Menu\AbstractMenuBuilder;

class MenuBuilder extends AbstractMenuBuilder
{
    /**
     * {@inheritdoc}
     */
    public function createMainMenu()
    {
        $menu = $this->createRootMenu('main_menu');

        $this->addChild($menu, 'menu.dashbord', 'nim_dashboard', 'icon-dashboard');
        $this->addChild($menu, 'menu.agency', 'nim_agency_index', 'icon-rocket');
        $this->addChild($menu, 'menu.mission', 'nim_mission_index', 'icon-rocket');
        $this->addChild($menu, 'menu.worker', 'nim_worker_index', 'icon-male');
        $this->addChild($menu, 'menu.vaccine', 'nim_vaccine_index', 'icon-beaker');

        return $menu;
    }

    /**
     * {@inheritdoc}
     */
    public function createUserMenu()
    {
        $user = $this->securityContext->getToken()->getUser();
        $menu = $this->createRootMenu('user_menu', ['class' => 'nav navbar-nav navbar-right',]);

        $this->addChild($menu, $user, 'fos_user_profile_show', 'icon-wrench');
        $this->addChild($menu, 'menu.logout', 'fos_user_security_logout', 'icon-off');

        return $menu;
    }
}
