<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ResolveDoctrineTargetEntitiesPass;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NIMCoreBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'nim_core';
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(
            new ResolveDoctrineTargetEntitiesPass(
                $this->getBundlePrefix(),
                $this->getEntities()
            )
        );

        if (null !== $this->getEntityPath()) {
            foreach ($this->getMapping() as $key => $value) {
                $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver(
                    array($key => $value),
                    array('doctrine.orm.entity_manager'),
                    $this->getBundlePrefix().'.driver.doctrine/orm'
                ));
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
    {
        return array(
            'NIM\CoreBundle\Model\Core' => 'nim.model.core.class',
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntityPath()
    {
        return 'Model';
    }

    /**
     * Return xml mapping (XML - Entity)
     *
     * @return array
     */
    protected function getMapping()
    {
        $entityPath = sprintf("%s\\%s", $this->getNamespace(), ucfirst($this->getEntityPath()));

        return array(
            $this->getXmlFilesPath() => $entityPath,
        );
    }

    /**
     * Generate the path to the xml directory
     *
     * @return string
     * @throws \Exception
     */
    protected function getXmlFilesPath()
    {
        $xmlFilesPath = sprintf("%s/Resources/config/doctrine/%s", $this->getPath(), strtolower($this->getEntityPath()));

        if (false == ($realXmlFilesPath = realpath($xmlFilesPath))) {
            throw new \Exception('');
        }

        return $realXmlFilesPath;
    }
}
