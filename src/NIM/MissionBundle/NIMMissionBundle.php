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

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NIMMissionBundle extends AbstractResourceBundle
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
    protected function getModelInterfaces()
    {
        return array('NIM\MissionBundle\Model\MissionInterface' => 'nim.model.mission.class');
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
    protected function getModelNamespace()
    {
        return 'NIM\MissionBundle\Model';
    }
}
