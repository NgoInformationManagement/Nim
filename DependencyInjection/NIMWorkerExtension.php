<?php

namespace NIM\WorkerBundle\DependencyInjection;

use NIM\WorkerBundle\NIMWorkerBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class NIMWorkerExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $driver = 'doctrine/orm'; // todo

        if (!in_array($driver, NIMWorkerBundle::getSupportedDrivers())) {
            throw new \InvalidArgumentException(sprintf('Driver "%s" is unsupported by NIMWorkerBundle.', $driver));
        }

        //$loader->load(sprintf('driver/%s.xml', $driver));

        $container->setParameter('nim_worker.driver', $driver);
        $container->setParameter('nim_worker.driver.'.$driver, true);

        $loader->load('services.xml');
    }
}
