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

use NIM\Component\Model\EditableModelTrait;
use NIM\WorkerBundle\Model\Entity\AddressingTrait;
use NIM\WorkerBundle\Model\Entity\ContactableTrait;
use NIM\WorkerBundle\Model\Entity\EntityAbstract;

class Agency extends EntityAbstract
{
    private $name;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
