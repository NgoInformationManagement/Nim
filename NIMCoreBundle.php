<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle;

use NIM\Component\Bundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NIMCoreBundle extends Bundle
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
        return 'nim_core';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
    {
        return array(
            'NIM\CoreBundle\Model\Core' => 'nim.model.core.class',
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
