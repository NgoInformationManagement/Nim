<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\CoreBundle\Model;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    protected $id;
}
