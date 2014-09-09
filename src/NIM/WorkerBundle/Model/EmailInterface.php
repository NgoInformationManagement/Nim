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

use Sylius\Component\Resource\Model\SoftDeletableInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface EmailInterface extends TimestampableInterface, SoftDeletableInterface
{
    /**
     * Set the email address
     *
     * @param string $address
     */
    public function setAddress($address);

    /**
     * Get the email address
     *
     * @return string
     */
    public function getAddress();
}
