<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle\DependencyInjection;

use NIM\CoreBundle\NIMCoreBundle;
use Sylius\Bundle\ResourceBundle\DependencyInjection\SyliusResourceExtension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

class NIMCoreExtension extends SyliusResourceExtension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/container'));
        $driver = $config['driver'];

//        $this->loadDriver($driver, $loader);

        $container->setParameter('nim_core.driver', $driver);
        $container->setParameter('nim_core.driver.'.$driver, true);
    }

    /**
     * Load bundle driver.
     *
     * @param string        $driver
     * @param XmlFileLoader $loader
     *
     * @throws \InvalidArgumentException
     */
    protected function loadDriver($driver, XmlFileLoader $loader)
    {
        if (!in_array($driver, NIMCoreBundle::getSupportedDrivers())) {
            throw new \InvalidArgumentException(sprintf('Driver "%s" is unsupported by NIMCoreBundle.', $driver));
        }

        $loader->load(sprintf('driver/%s.xml', $driver));
    }

    /**
     * Remap class parameters.
     *
     * @param array            $classes
     * @param ContainerBuilder $container
     */
    protected function mapClassParameters(array $classes, ContainerBuilder $container)
    {
        foreach ($classes as $model => $serviceClasses) {
            foreach ($serviceClasses as $service => $class) {
                $service = $service === 'form' ? 'form.type' : $service;
                $container->setParameter(sprintf('nim.%s.%s.class', $service, $model), $class);
            }
        }
    }

    /**
     * Remap validation group parameters.
     *
     * @param array            $validationGroups
     * @param ContainerBuilder $container
     */
    protected function mapValidationGroupParameters(array $validationGroups, ContainerBuilder $container)
    {
        foreach ($validationGroups as $model => $groups) {
            $container->setParameter(sprintf('nim.validation_group.%s', $model), $groups);
        }
    }
}
