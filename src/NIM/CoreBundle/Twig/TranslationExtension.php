<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\CoreBundle\Twig;

use \Gedmo\Translatable\Translatable;
use \Doctrine\Common\Util\ClassUtils;
use Symfony\Component\DependencyInjection\Container;
use Twig_Extension;

class TranslationExtension extends Twig_Extension
{
    protected $container;
    protected $doctrine;
    protected $gedmoTranslatableListener;
    protected $defaultTemplate;
    protected $translationConfiguration = null;

    /**
     * Constructor
     *
     * @param $container
     * @param $doctrine
     * @param $gedmoTranslatableListener
     * @param $defaultTemplate
     */
    public function __construct($container, $doctrine, $gedmoTranslatableListener, $defaultTemplate)
    {
        $this->container = $container;
        $this->defaultTemplate = $defaultTemplate;
        $this->gedmoTranslatableListener = $gedmoTranslatableListener;
        $this->doctrine = $doctrine;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'nim_translation' => new \Twig_Function_Method(
                $this,
                'renderTranslations',
                array('is_safe' => array('html'))
            ),
        );
    }

    /**
     * @param $entity
     * @param  null  $transNamespace
     * @param  array $options
     * @return mixed
     */
    public function renderTranslations($entity, $transNamespace = null, $options = array())
    {
        if (!array_key_exists('defaultTemplate', $options)) {
            $options['defaultTemplate'] = $this->defaultTemplate;
        }

        $translations = $this->getTranslationFromEntity($entity);

        return $this->container->get('templating')->render(
            $options['defaultTemplate'],
            array(
                'translations' => $translations,
                'locales' => array_keys($translations),
                'defaultLocale' => $this->getDefaultLocale(),
                'transNamespace' => $transNamespace
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nim_translation';
    }

    /**
     * @param  Translatable $entity
     * @return array
     */
    private function getTranslationFromEntity(Translatable $entity)
    {
        $translations = $this->getDefaultTranslation($entity);

        foreach ($entity->getTranslations() as $translation) {
            $translations[$translation->getLocale()][$translation->getField()] = $translation->getContent();
        }

        return $translations;
    }

    /**
     * @param  Translatable $entity
     * @return array
     */
    private function getDefaultTranslation(Translatable $entity)
    {
        $translations = array();
        $fields = $this->getTranslatableFields($entity);

        foreach ($fields as $field) {
            $method = sprintf('get%s', ucfirst($field));
            $translations[$field] = $entity->$method();
        }

        return array(
            $this->getDefaultLocale() => $translations
        );
    }

    /**
     * @param  Translatable $entity
     * @return mixed
     */
    private function getEntityConfiguration(Translatable $entity)
    {
        if (null === $this->translationConfiguration) {
            $translatableClass = ClassUtils::getClass($entity);
            $manager = $this->doctrine->getManagerForClass($translatableClass);

            $this->translationConfiguration = $this->gedmoTranslatableListener->getConfiguration(
                $manager,
                $translatableClass
            );
        }

        return $this->translationConfiguration;
    }

    /**
     * @param  Translatable $entity
     * @return mixed
     */
    private function getTranslatableFields(Translatable $entity)
    {
        $this->getEntityConfiguration($entity);

        return $this->translationConfiguration['fields'];
    }

    /**
     * @return string
     */
    private function getDefaultLocale()
    {
        return $this->gedmoTranslatableListener->getDefaultLocale();
    }
}
