<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model\Core\Contactable;

use NIM\CoreBundle\Model\ConstantInterface;

class PhoneTypes implements ConstantInterface
{
    const CELLPHONE = 'cellphone';
    const FAX = 'fax';
    const PHONE = 'phone';

    /**
     * {@inheritdoc}
     */
    public static function getTypes($translationDomain = null)
    {
        return array (
            self::PHONE => $translationDomain . '.' . self::PHONE,
            self::CELLPHONE => $translationDomain . '.' . self::CELLPHONE,
            self::FAX => $translationDomain . '.' . self::FAX,
        );
    }
}
