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

use Nim\Component\Resource\Model\SoftDeletableTrait;
use Nim\Component\Resource\Model\TimestampableTrait;

class Email implements EmailInterface
{
    use \Nim\Component\Resource\Model\SoftDeletableTrait,
        \Nim\Component\Resource\Model\TimestampableTrait;

    protected $id;
    protected $address;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
}
