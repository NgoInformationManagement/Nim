<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ResolveDoctrineTargetEntitiesPass;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NIMWorkerBundle extends Bundle
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
            'nim_worker',
            array(
                'NIM\WorkerBundle\Model\Core\WorkerInterface' => 'nim.model.worker.class',
                'NIM\WorkerBundle\Model\Core\AgencyInterface' => 'nim.model.agency.class',
                'NIM\WorkerBundle\Model\Core\ContactInterface' => 'nim.model.contact.class',
                'NIM\WorkerBundle\Model\Core\EmailInterface' => 'nim.model.email.class',
                'NIM\WorkerBundle\Model\Core\PhoneInterface' => 'nim.model.phone.class',
            )
        ));

        $container->addCompilerPass(
            DoctrineOrmMappingsPass::createXmlMappingDriver(
                array(realpath(__DIR__ . '/Resources/config/doctrine/model') => 'NIM\WorkerBundle\Model'),
                array('doctrine.orm.entity_manager'),
                'nim_worker.driver.doctrine/orm'
            )
        );
    }
}
