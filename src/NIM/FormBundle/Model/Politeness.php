<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Model;

class Politeness
{
    const MADAM = 'madam';
    const MISS = 'miss';
    const MISTER = 'mister';

    public static function getOptions($transDomain = 'politeness')
    {
        return array(
            self::MADAM => $transDomain .'.'. self::MADAM,
            self::MISS => $transDomain .'.'. self::MISS,
            self::MISTER => $transDomain .'.'. self::MISTER,
        );
    }
}
