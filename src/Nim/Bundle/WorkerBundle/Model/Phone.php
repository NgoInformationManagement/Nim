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

class Phone implements PhoneInterface
{
    use \Nim\Component\Resource\Model\SoftDeletableTrait,
        \Nim\Component\Resource\Model\TimestampableTrait;

    protected $id;
    protected $type;
    protected $number;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }
}
