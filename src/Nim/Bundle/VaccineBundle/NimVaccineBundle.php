<?php

namespace Nim\Bundle\VaccineBundle;

use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NimVaccineBundle extends AbstractResourceBundle
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
            'Nim\Bundle\VaccineBundle\Model\VaccineInterface' => 'nim.model.vaccine.class'
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'nim_vaccine';
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace()
    {
        return 'Nim\Bundle\VaccineBundle\Model';
    }
}
