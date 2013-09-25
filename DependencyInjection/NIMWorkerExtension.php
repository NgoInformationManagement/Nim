<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\DependencyInjection;

use NIM\Component\DependencyInjection\NIMExtension;
use NIM\WorkerBundle\NIMWorkerBundle;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

class NIMWorkerExtension extends NIMExtension
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

        $this->mapClassParameters($config['classes'], $container);
        $this->mapValidationGroupParameters($config['validation_groups'], $container);
        $this->loadDriver($driver, $loader);

        $container->setParameter('nim_worker.driver', $driver);
        $container->setParameter('nim_worker.driver.'.$driver, true);
    }

    /**
     * Load bundle driver.
     *
     * @param string $driver
     * @param XmlFileLoader $loader
     *
     * @throws \InvalidArgumentException
     */
    protected function loadDriver($driver, XmlFileLoader $loader)
    {
        if (!in_array($driver, NIMWorkerBundle::getSupportedDrivers())) {
            throw new \InvalidArgumentException(sprintf('Driver "%s" is unsupported by NIMWorkerBundle.', $driver));
        }

        $loader->load(sprintf('driver/%s.xml', $driver));
        $loader->load('worker.xml');
        $loader->load('agency.xml');
        $loader->load('passport.xml');
        $loader->load('visa.xml');
        $loader->load('contact.xml');
    }
}
