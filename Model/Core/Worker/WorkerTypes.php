<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model\Core\Worker;

use NIM\FormBundle\Model\Core\ConstantInterface;

class WorkerTypes implements ConstantInterface
{
    const EMPLOYEE = 'employee';
    const VOLUNTEER = 'volunteer';
    const INTERN = 'intern';

    /**
     * {@inheritdoc}
     */
    public static function getTypes($translationDomain = null)
    {
        return array (
            self::EMPLOYEE => $translationDomain . '.' . self::EMPLOYEE,
            self::VOLUNTEER => $translationDomain . '.' . self::VOLUNTEER,
            self::INTERN => $translationDomain . '.' . self::INTERN,
        );
    }
}
