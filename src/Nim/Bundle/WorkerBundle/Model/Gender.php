<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Model;

class Gender
{
    const MALE = 'male';
    const FEMALE = 'female';

    public static function getOptions($transDomain = 'gender')
    {
        return array(
            self::MALE => $transDomain.'.'.self::MALE,
            self::FEMALE => $transDomain.'.'.self::FEMALE,
        );
    }
}
