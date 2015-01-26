<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\DependencyInjection;

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

        $this->addClassesSection($rootNode);
        $this->addValidationGroupsSection($rootNode);
        $this->addTemplateSection($rootNode);

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
                        ->arrayNode('email')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                        ->arrayNode('phone')
                            ->prototype('scalar')->end()
                            ->defaultValue(array('nim'))
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    /**
     * Adds `template` section.
     *
     * @param ArrayNodeDefinition $node
     */
    private function addTemplateSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('templates')
                ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('worker')->defaultValue('NimWorkerBundle:Worker')->end()
                        ->scalarNode('visa')->defaultValue('NimWorkerBundle:Visa')->end()
                        ->scalarNode('passport')->defaultValue('NimWorkerBundle:Passport')->end()
                        ->scalarNode('contact')->defaultValue('NimWorkerBundle:Contact')->end()
                        ->scalarNode('agency')->defaultValue('NimWorkerBundle:Agency')->end()
                        ->scalarNode('email')->defaultValue('NimWorkerBundle:Email')->end()
                        ->scalarNode('phone')->defaultValue('NimWorkerBundle:Phone')->end()
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
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Worker')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\WorkerType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('agency')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Agency')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\AgencyType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('visa')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Visa')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\VisaType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('passport')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Passport')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\PassportType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('contact')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Contact')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\ContactType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('email')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Email')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\EmailType')->end()
                            ->end()
                        ->end()

                        ->arrayNode('phone')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Nim\Bundle\WorkerBundle\Model\Phone')->end()
                                ->scalarNode('controller')->defaultValue('Sylius\Bundle\ResourceBundle\Controller\ResourceController')->end()
                                ->scalarNode('repository')->cannotBeEmpty()->end()
                                ->scalarNode('form')->defaultValue('Nim\Bundle\WorkerBundle\Form\Type\PhoneType')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
