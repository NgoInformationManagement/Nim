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
        $this->addValidationGroupsSection($rootNode);

        return $treeBuilder;
    }

    /**
     * Adds `validation_groups` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addValidationGroupsSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('validation_groups')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('worker')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                        ->arrayNode('visa')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                        ->arrayNode('passport')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                        ->arrayNode('contact')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                        ->arrayNode('agency')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
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
                                ->scalarNode('model')->defaultValue('NIM\\WorkerBundle\\Model\\Worker')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\WorkerBundle\\Controller\\WorkerController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\WorkerBundle\\Form\\Type\\WorkerType')->end()
                            ->end()
                        ->end()
                        ->arrayNode('agency')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\WorkerBundle\\Model\\Agency')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\\Bundle\\ResourceBundle\\Controller\\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\WorkerBundle\\Form\\Type\\AgencyType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('visa')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\WorkerBundle\\Model\\Visa')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\WorkerBundle\\Controller\\VisaController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\WorkerBundle\\Form\\Type\\VisaType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('passport')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\WorkerBundle\\Model\\Passport')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\WorkerBundle\\Controller\\PassportController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\WorkerBundle\\Form\\Type\\PassportType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('contact')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('NIM\\WorkerBundle\\Model\\Contact')->end()
                                ->scalarNode('controller')->defaultValue('NIM\\WorkerBundle\\Controller\\ContactController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('NIM\\WorkerBundle\\Form\\Type\\ContactType')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
