<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\AbstractResourceExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class NimWorkerExtension extends AbstractResourceExtension
{
    protected $applicationName = 'nim';
    protected $configDirectory = '/../Resources/config/container';
    protected $configFiles = array(
        'services',
        'worker',
        'agency',
        'contactable',
    );

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->configure(
            $configs,
            new Configuration(),
            $container,
            self::CONFIGURE_LOADER | self::CONFIGURE_DATABASE | self::CONFIGURE_PARAMETERS | self::CONFIGURE_VALIDATORS | self::CONFIGURE_FORMS
        );

        if ($container->has('nim.form.type.worker')) {
            $workerForm = $container->findDefinition('nim.form.type.worker');
            $workerForm->addArgument(new Reference('nim.form.subscriber.worker'));
        }
    }
}
