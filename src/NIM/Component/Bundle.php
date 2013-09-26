<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\Component;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ResolveDoctrineTargetEntitiesPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

abstract class Bundle extends BaseBundle
{
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
            $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver(
                $this->getMapping(),
                array('doctrine.orm.entity_manager'),
                $this->getBundlePrefix().'.driver.doctrine/orm'
            ));
        }
    }

    /**
     * Return array of currently supported drivers.
     *
     * @return array
     */
    abstract public static function getSupportedDrivers();

    /**
     * Return the prefix of the bundle
     *
     * @return string
     */
    abstract protected function getBundlePrefix();

    /**
     * Return an array of entity settings
     *
     * @return array
     */
    abstract protected function getEntities();

    /**
     * @return array
     */
    protected function getMapping()
    {
        $xmlPath = sprintf("%s/Resources/config/doctrine/%s", __DIR__, strtolower($this->getEntityPath()));
        $entityPath = sprintf("%s\\%s", $this->getNamespace(), ucfirst($this->getEntityPath()));

        return array(
            realpath($xmlPath) => $entityPath,
        );
    }

    /**
     * Return the path to the Entity directory
     * It only manage one level
     *
     * @return string
     */
    protected function getEntityPath()
    {
        return null;
    }
}
