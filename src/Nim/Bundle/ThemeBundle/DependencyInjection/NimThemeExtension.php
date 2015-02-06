<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\ThemeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class NimThemeExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $processor = new Processor();
        $config = $processor->processConfiguration(new Configuration(), $config);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('logo', $config['logo']);
        $container->setParameter('dashboard_url', $config['dashboard_url']);
        $this->createMenuDefinitions($container, $config['menu_builder']);
    }

    /**
     * {@inheritDoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (isset($bundles['TwigBundle'])) {
            $container->prependExtensionConfig('twig', [
                'globals' => [
                    'logo' => '%logo%',
                    'dashboard_url' => '%dashboard_url%',
                ],
                'form' => [
                    'resources' => [
                        'NimThemeBundle::form.html.twig',
                    ],
                ]
            ]);
        }

        if (isset($bundles['KnpMenuBundle'])) {
            $container->prependExtensionConfig('knp_menu', [
                'twig' => [
                    'template' => 'NimThemeBundle::menu.html.twig',
                ],
            ]);
        }

        if (isset($bundles['AsseticBundle'])) {
            $container->prependExtensionConfig('assetic', [
                'bundles' => [
                    'NimThemeBundle',
                ],
                'assets' => [
                    'nim_login' => [
                        'inputs' => [
                            'assets/vendor/bootstrap/dist/css/bootstrap.css',
                            'bundles/nimtheme/css/login.css',
                        ],
                    ],
                    'nim_theme_css' => [
                        'inputs' => [
                            'assets/vendor/bootstrap/dist/css/bootstrap.css',
                            'assets/vendor/bootstrap-datepicker/css/datepicker3.css',
                            'assets/vendor/font-awesome/css/font-awesome.css',
                            'bundles/nimtheme/css/theme.css',
                        ],
                    ],
                    'nim_theme_js' => [
                        'inputs' => [
                            'assets/vendor/jquery/dist/jquery.min.js',
                            'assets/vendor/bootstrap/dist/js/bootstrap.min.js',
                            'assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
                        ],
                    ],
                ]
            ]);
        }
    }

    /**
     * @param ContainerBuilder $container
     * @param $builderClasse
     */
    protected function createMenuDefinitions(ContainerBuilder $container, $builderClasse)
    {
        $menuBuidlerdefinition = (new Definition($builderClasse))
            ->setArguments([
                new Reference('knp_menu.factory'),
                new Reference('security.context'),
                new Reference('request_stack'),
            ]);

        $container->setDefinition('nim.theme.menu_builder', $menuBuidlerdefinition);

        $mainMenuDefinition = (new Definition('Knp\Menu\MenuItem'))
            ->setFactoryService('nim.theme.menu_builder')
            ->setFactoryMethod('createMainMenu')
            ->setArguments([new Reference('request_stack')])
            ->addTag('knp_menu.menu', ['alias' => 'main_menu'])
        ;

        $container->setDefinition('nim.theme.main_menu', $mainMenuDefinition);

        $userMenuDefinition = (new Definition('Knp\Menu\MenuItem'))
            ->setFactoryService('nim.theme.menu_builder')
            ->setFactoryMethod('createUserMenu')
            ->setArguments([new Reference('request_stack')])
            ->addTag('knp_menu.menu', ['alias' => 'user_menu'])
        ;

        $container->setDefinition('nim.theme.user_menu', $userMenuDefinition);
    }
}
