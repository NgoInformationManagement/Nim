<?php
/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Model\Core;

interface EntityFormTypeInterface
{
    /**
     * Return an array of data for Entity Form Type
     *
     * @return array
     */
    public function getEntityFormTypeData();
}
