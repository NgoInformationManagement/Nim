<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\MissionBundle;

use NIM\Component\Bundle;
use NIM\CoreBundle\NIMCoreBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NIMMissionBundle extends NIMCoreBundle
{
    /**
     * {@inheritdoc}
     */
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'nim_mission';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
    {
        return array(
            'NIM\MissionBundle\Model\Mission' => 'nim.model.mission.class',
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntityPath()
    {
        return 'Model';
    }
}
