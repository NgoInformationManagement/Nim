<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\VaccineBundle\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\AbstractResourceExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NimVaccineExtension extends AbstractResourceExtension
{
    protected $applicationName = 'nim';
    protected $configDirectory = '/../Resources/config/container';
    protected $configFiles = array(
        'vaccine',
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

        if ($container->has('nim.form.type.vaccine')) {
            $vaccineForm = $container->findDefinition('nim.form.type.vaccine');
            $vaccineForm->addArgument('%nim.model.vaccine.class%');
        }
    }
}
