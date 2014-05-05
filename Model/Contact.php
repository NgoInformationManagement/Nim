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

use NIM\FormBundle\Model\Core\SoftDeletableTrait;
use NIM\WorkerBundle\Model\ContactInterface;

class Contact extends AbstractPerson implements ContactInterface
{
    use SoftDeletableTrait;
}
