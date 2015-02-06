<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Component\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

class BaseContext extends RawMinkContext implements Context, KernelAwareContext
{
    protected $appName = 'nim';

    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * {@inheritdoc}
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @BeforeScenario
     */
    public function purgeDatabase(BeforeScenarioScope $scope)
    {
        /** @var EntityManager $em */
        $em = $this->getService('doctrine.orm.entity_manager');

        $em->getConnection()->executeQuery('SET FOREIGN_KEY_CHECKS=0;');

        $purger = new ORMPurger($this->getService('doctrine.orm.entity_manager'));
        $purger->purge();

        $em->getConnection()->executeQuery('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Find one resource by name.
     *
     * @param string $type
     * @param string $name
     *
     * @return object
     */
    protected function findOneByName($type, $name)
    {
        return $this->findOneBy($type, array('name' => trim($name)));
    }

    /**
     * Find one resource by criteria.
     *
     * @param string $type
     * @param array  $criteria
     *
     * @return object
     *
     * @throws \InvalidArgumentException
     */
    protected function findOneBy($type, array $criteria)
    {
        $resource = $this
            ->getRepository($type)
            ->findOneBy($criteria)
        ;

        if (null === $resource) {
            throw new \InvalidArgumentException(
                sprintf('%s for criteria "%s" was not found.', str_replace('_', ' ', ucfirst($type)), serialize($criteria))
            );
        }

        return $resource;
    }

    /**
     * Get repository by resource name.
     *
     * @param string $resource
     *
     * @return RepositoryInterface
     */
    protected function getRepository($resource)
    {
        return $this->getService($this->appName.'.repository.'.$resource);
    }

    /**
     * Get entity manager.
     *
     * @return ObjectManager
     */
    protected function getEntityManager()
    {
        return $this->getService('doctrine')->getManager();
    }

    /**
     * Returns Container instance.
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->kernel->getContainer();
    }

    /**
     * Get service by id.
     *
     * @param string $id
     *
     * @return object
     */
    protected function getService($id)
    {
        return $this->getContainer()->get($id);
    }

    /**
     * Get current user instance.
     *
     * @return null|UserInterface
     *
     * @throws \Exception
     */
    protected function getUser()
    {
        $token = $this->getSecurityContext()->getToken();

        if (null === $token) {
            throw new \Exception('No token found in security context.');
        }

        return $token->getUser();
    }

    /**
     * Get security context.
     *
     * @return SecurityContextInterface
     */
    protected function getSecurityContext()
    {
        return $this->getContainer()->get('security.context');
    }

    /**
     * Generate url.
     *
     * @param string  $route
     * @param array   $parameters
     * @param Boolean $absolute
     *
     * @return string
     */
//    protected function generateUrl($route, array $parameters = array(), $absolute = false)
//    {
//        return $this->locatePath($this->getService('router')->generate($route, $parameters, $absolute));
//    }

    /**
     * Presses button with specified id|name|title|alt|value.
     */
    protected function pressButton($button)
    {
        $this->getSession()->getPage()->pressButton($this->fixStepArgument($button));
    }

    /**
     * Clicks link with specified id|title|alt|text.
     */
    protected function clickLink($link)
    {
        $this->getSession()->getPage()->clickLink($this->fixStepArgument($link));
    }

    /**
     * Fills in form field with specified id|name|label|value.
     */
    protected function fillField($field, $value)
    {
        $this->getSession()->getPage()->fillField($this->fixStepArgument($field), $this->fixStepArgument($value));
    }

    /**
     * Selects option in select field with specified id|name|label|value.
     */
    public function selectOption($select, $option)
    {
        $this->getSession()->getPage()->selectFieldOption($this->fixStepArgument($select), $this->fixStepArgument($option));
    }

    /**
     * Returns fixed step argument (with \\" replaced back to ").
     *
     * @param string $argument
     *
     * @return string
     */
    protected function fixStepArgument($argument)
    {
        return str_replace('\\"', '"', $argument);
    }

    /**
     * Generate url.
     *
     * @param string  $route
     * @param array   $parameters
     * @param Boolean $absolute
     *
     * @return string
     */
    protected function generateUrl($route, array $parameters = array(), $absolute = false)
    {
        $url = $this->getService('router')->generate($route, $parameters, $absolute);

//        if ($this->isSeleniumTest()) {
//            return sprintf('%s%s', $this->getMinkParameter('base_url'), $url);
//        }

        return $url;
    }

    /**
     * Set data to an object
     *
     * @param object $object
     * @param array  $data
     */
    protected function setDataToObject($object, array $data)
    {
        foreach ($data as $property => $value) {
            if (1 === preg_match('/date/', strtolower($property))) {
                $value = new \DateTime($value);
            }

            $propertyName = ucfirst($property);
            if (false !== strpos(' ', $property)) {
                $propertyName = '';
                $propertyParts = explode(' ', $property);

                foreach ($propertyParts as $part) {
                    $part = ucfirst($part);
                    $propertyName .= $part;
                }
            }

            $method = 'set'.$propertyName;
            if (method_exists($object, $method)) {
                $object->{'set'.$propertyName}($value);
            }
        }
    }

    /**
     * Persist and flush $entity
     *
     * @param string $entity
     * @param $flush $entity
     *
     * @return mixed
     */
    protected function persistAndFlush($entity, $flush = true)
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }

        return $entity;
    }

    /**
     * Find single resource
     *
     * @param string $resourceName
     * @param array  $criteria
     *
     * @return object
     */
    protected function findResourceBy($resourceName, array $criteria)
    {
        return $this->getRepository($resourceName)
            ->findOneBy($criteria);
    }
}
