<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\VaccineBundle\Model;

use Sylius\Component\Resource\Model\TimestampableInterface;

interface VaccineInterface extends TimestampableInterface
{
    /**
     * Set the description of the mission
     *
     * @param string $description
     */
    public function setDescription($description);

    /**
     * Get the description of the mission
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set the title of the mission
     *
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Get the title of the mission
     *
     * @return string
     */
    public function getTitle();
}
