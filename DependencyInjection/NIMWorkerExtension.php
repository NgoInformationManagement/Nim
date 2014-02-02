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

use NIM\CoreBundle\DependencyInjection\NIMCoreExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NIMWorkerExtension extends NIMCoreExtension
{
    protected $configFiles = array(
        'base',
        'worker',
        'agency',
        'passport',
        'visa',
        'contact'
    );

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->configDir = __DIR__.'/../Resources/config/container';

        $this->configure(
            $configs,
            new Configuration(),
            $container,
            self::CONFIGURE_LOADER | self::CONFIGURE_DATABASE | self::CONFIGURE_PARAMETERS | self::CONFIGURE_VALIDATORS
        );
    }
}
