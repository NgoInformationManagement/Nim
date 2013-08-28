<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle;

use NIM\Component\Bundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NIMWorkerBundle extends Bundle
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
        return 'nim_worker';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
    {
        return array(
            'NIM\WorkerBundle\Model\Worker' => 'nim.model.worker.class',
            'NIM\WorkerBundle\Model\Agency' => 'nim.model.agency.class',
            'NIM\WorkerBundle\Model\Contact' => 'nim.model.contact.class',
            'NIM\WorkerBundle\Model\Passport' => 'nim.model.passport.class',
            'NIM\WorkerBundle\Model\Visa' => 'nim.model.visa.class',
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
