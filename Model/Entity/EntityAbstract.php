<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model\Entity;

use NIM\Component\Model\EditableModelTrait;
use NIM\WorkerBundle\Model\Entity\AddressingTrait;
use NIM\WorkerBundle\Model\Entity\ContactableTrait;
use Doctrine\Common\Collections\ArrayCollection;

abstract class EntityAbstract
{
    use ContactableTrait,
        AddressingTrait,
        EditableModelTrait;

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
