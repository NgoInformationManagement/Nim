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

class Contact extends AbstractPerson implements ContactInterface
{
    use \Nim\Component\Resource\Model\SoftDeletableTrait;
}
