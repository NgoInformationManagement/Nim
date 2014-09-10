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

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NIMWorkerBundle extends AbstractResourceBundle
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
        return array(
            'NIM\WorkerBundle\Model\WorkerInterface' => 'nim.model.worker.class',
            'NIM\WorkerBundle\Model\AgencyInterface' => 'nim.model.agency.class',
            'NIM\WorkerBundle\Model\ContactInterface' => 'nim.model.contact.class',
            'NIM\WorkerBundle\Model\EmailInterface' => 'nim.model.email.class',
            'NIM\WorkerBundle\Model\PhoneInterface' => 'nim.model.phone.class',
            'NIM\WorkerBundle\Model\VisaInterface' => 'nim.model.visa.class',
            'NIM\WorkerBundle\Model\PassportInterface' => 'nim.model.passport.class',
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
    protected function getModelNamespace()
    {
        return 'NIM\WorkerBundle\Model';
    }
}
