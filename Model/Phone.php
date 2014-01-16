<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model;

use NIM\FormBundle\Model\Core\TimestampableTrait;

class Phone
{
    use TimestampableTrait;

    const CELLPHONE = 'cellphone';
    const FAX = 'fax';
    const PHONE = 'phone';

    protected $id;
    protected $type;
    protected $number;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }



    /**
     * @param null|string $transDomain
     * @return array
     */
    public static function getPhoneTypes($transDomain = null)
    {
        return array (
            self::CELLPHONE => $transDomain . '.' . self::CELLPHONE,
            self::FAX => $transDomain . '.' . self::FAX,
            self::PHONE => $transDomain . '.' . self::PHONE
        );
    }
}