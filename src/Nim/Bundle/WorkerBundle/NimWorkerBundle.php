<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NimWorkerBundle extends AbstractResourceBundle
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
            'Nim\Bundle\WorkerBundle\Model\WorkerInterface' => 'nim.model.worker.class',
            'Nim\Bundle\WorkerBundle\Model\AgencyInterface' => 'nim.model.agency.class',
            'Nim\Bundle\WorkerBundle\Model\ContactInterface' => 'nim.model.contact.class',
            'Nim\Bundle\WorkerBundle\Model\EmailInterface' => 'nim.model.email.class',
            'Nim\Bundle\WorkerBundle\Model\PhoneInterface' => 'nim.model.phone.class',
            'Nim\Bundle\WorkerBundle\Model\VisaInterface' => 'nim.model.visa.class',
            'Nim\Bundle\WorkerBundle\Model\PassportInterface' => 'nim.model.passport.class',
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
        return 'Nim\Bundle\WorkerBundle\Model';
    }
}
