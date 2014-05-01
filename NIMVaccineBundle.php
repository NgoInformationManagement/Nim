<?php

namespace NIM\VaccineBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ResolveDoctrineTargetEntitiesPass;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NIMVaccineBundle extends Bundle
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
            'nim_vaccine',
            array('NIM\VaccineBundle\Model\VaccineInterface' => 'nim.model.vaccine.class')
        ));

        $container->addCompilerPass(
            DoctrineOrmMappingsPass::createXmlMappingDriver(
                array(realpath(__DIR__ . '/Resources/config/doctrine/model') => 'NIM\VaccineBundle\Model'),
                array('doctrine.orm.entity_manager'),
                'nim_vaccine.driver.doctrine/orm'
            )
        );
    }
}
