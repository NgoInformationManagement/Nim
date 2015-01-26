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

use Sylius\Bundle\ResourceBundle\DependencyInjection\AbstractResourceExtension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

class NIMCoreExtension extends AbstractResourceExtension
{
    protected $applicationName = 'nim';
    protected $configDirectory = '/../Resources/config/container';

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new XmlFileLoader($container, new FileLocator($this->getConfigurationDirectory()));
        $driver = $config['driver'];

        $this->loadConfigurationFile($this->configFiles, $loader);
        $container->setParameter('nim_core.driver', $driver);
        $container->setParameter('nim_core.driver.'.$driver, true);
    }
}
