<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\CoreBundle\Behat;

use Behat\Behat\Context\Context;
use Nim\Bundle\CoreBundle\Model\User;
use Nim\Component\Behat\BaseContext;

class CoreContext extends BaseContext implements Context
{
    /**
     * @Given /^I am logged in as administrator$/
     */
    public function iAmLoggedInAsAdministrator()
    {
        $this->iAmLoggedInAsRole('ROLE_SUPER_ADMIN');
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
     * Create user and login with given role.
     *
     * @param string $role
     */
    private function iAmLoggedInAsRole($role)
    {
        $this->thereIsUser('admin', 'php', $role);
        $this->getSession()->visit($this->generateUrl('fos_user_security_login'));

        $this->fillField('_username', 'admin');
        $this->fillField('_password', 'password');
        $this->pressButton('Login');
    }
}