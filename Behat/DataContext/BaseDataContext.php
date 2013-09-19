<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Behat\DataContext;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use NIM\CoreBundle\Model\User;
use Symfony\Component\PropertyAccess\StringUtil;

trait BaseDataContext
{
    /**
     * @BeforeScenario
     */
    public function purgeDatabase()
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');

        $purger = new ORMPurger($entityManager);
        $purger->purge();
    }

    /**
     * @Given /^There are no ([^"]*)$/
     */
    public function thereAreNoResources($type)
    {
        $type = str_replace(' ', '_', StringUtil::singularify($type));
        $manager = $this->getEntityManager();

        foreach ($this->getRepository($type)->findAll() as $resource) {
            $this->getEntityManager()->remove($resource);
        }

        $manager->flush();
    }

    /**
     * @param $username
     * @param $password
     * @param $role
     * @return User
     */
    private function thereIsUser($username, $password, $role)
    {
        if (null === $user = $this->getService('fos_user.user_manager')->findUserBy(array('username' => $username))) {
            $user = new User();
            $user->setUsername('admin');
            $user->setEmail('admin@admin.fr');
            $user->setEnabled(true);
            $user->setPlainPassword($password);

            if (null !== $role) {
                $user->addRole($role);
            }

            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
        }
        return $user;
    }

    /**
     * Set data to an object
     *
     * @param $object
     * @param $data
     */
    private function setDataToObject($object, array $data)
    {
        foreach ($data as $property => $value) {
            $propertyName = ucfirst($property);
            if (false !== strpos(' ', $property)) {
                $propertyName = '';
                $propertyParts = explode(' ', $property);

                foreach ($propertyParts as $part) {
                    $part = ucfirst($part);
                    $propertyName .= $part;
                }
            }

            $object->{'set'.$propertyName}($value);
        }
    }

    private function getLocale($language)
    {
        $languages = array(
            'French' => "fr",
            'Spanish' => "es",
            'English' => "es"
        );

        if (array_key_exists($language, $languages)) {
            return $languages[$language];
        }
    }

    /**
     * Get repository by resource name.
     *
     * @param string $resource
     * @return ObjectRepository
     */
    private function getRepository($resource)
    {
        return $this->getService('nim.repository.'.$resource);
    }

    /**
     * Get entity manager.
     *
     * @return EntityManager
     */
    private function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }

    /**
     * Persist and flush $entity
     *
     * @param $entity
     */
    private function persistAndFlush($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
}