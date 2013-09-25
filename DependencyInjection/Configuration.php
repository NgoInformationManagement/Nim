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

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nim_worker');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('driver')->cannotBeOverwritten()->isRequired()->cannotBeEmpty()->end()
            ->end()
        ;
        
        $this->addClassesSection( $rootNode);

        return $treeBuilder;
    }

    /**
     * Adds `classes` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addClassesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('classes')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('worker')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\NIMWorkerBundle\\Model\\Worker')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\NIMWorkerBundle\\Controller\\WorkerController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\NIMWorkerBundle\\Form\\Type\\WorkerType')->end()
                            ->end()
                        ->end()
                        ->arrayNode('agency')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\NIMWorkerBundle\\Model\\Agency')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\NIMWorkerBundle\\Controller\\AgencyController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\NIMWorkerBundle\\Form\\Type\\AgencyType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('visa')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\NIMWorkerBundle\\Model\\Visa')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\NIMWorkerBundle\\Controller\\VisaController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\NIMWorkerBundle\\Form\\Type\\VisaType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('passport')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\NIMWorkerBundle\\Model\\Passport')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\NIMWorkerBundle\\Controller\\PassportController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\NIMWorkerBundle\\\Form\\Type\\PassportType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('contact')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\NIMWorkerBundle\\Model\\Contact')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\NIMWorkerBundle\\Controller\\ContactController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\NIMWorkerBundle\\\Form\\Type\\ContactType')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
