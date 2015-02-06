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

use Nim\Component\Resource\Model\TimestampableTrait;
use Nim\Bundle\WorkerBundle\Model\Addressing\AddressingTrait;
use Nim\Bundle\WorkerBundle\Model\Contactable\ContactableTrait;
use Doctrine\Common\Collections\ArrayCollection;

abstract class AbstractEntity
{
    use Contactable\ContactableTrait,
        Addressing\AddressingTrait,
        TimestampableTrait;

    protected $id;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->emails = new ArrayCollection();
        $this->phones = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
