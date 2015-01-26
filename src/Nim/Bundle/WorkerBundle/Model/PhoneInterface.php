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

use Sylius\Component\Resource\Model\SoftDeletableInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface PhoneInterface extends TimestampableInterface, SoftDeletableInterface
{
    /**
     * Set the phone type
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * Get the phone type
     *
     * @return string
     */
    public function getType();

    /**
     * Set the phone number
     *
     * @param string $number
     */
    public function setNumber($number);

    /**
     * Get the phone number
     *
     * @return string
     */
    public function getNumber();
}
