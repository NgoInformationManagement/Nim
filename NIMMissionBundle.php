<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\MissionBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ResolveDoctrineTargetEntitiesPass;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NIMMissionBundle extends Bundle
{
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ResolveDoctrineTargetEntitiesPass(
            'nim_mission',
            array('NIM\MissionBundle\Model\Core\MissionInterface' => 'nim.model.mission.class')
        ));

        $container->addCompilerPass(
            DoctrineOrmMappingsPass::createXmlMappingDriver(
                array(realpath(__DIR__ . '/Resources/config/doctrine/model') => 'NIM\MissionBundle\Model'),
                array('doctrine.orm.entity_manager'), 'nim_mission.driver.doctrine/orm'
            )
        );
    }
}
