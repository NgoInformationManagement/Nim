<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Component\Resource\Model;

interface ConstantInterface
{
    /**
     * Return all the types
     *
     * @param  null|string $translationDomain
     * @return array
     */
    public static function getTypes($translationDomain = null);
}
