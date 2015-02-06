<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\VaccineBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Translatable\Translatable;
use Nim\Component\Resource\Model\EntityFormTypeInterface;
use Nim\Component\Resource\Model\SoftDeletableTrait;
use Nim\Component\Resource\Model\TimestampableTrait;

class Vaccine implements Translatable, VaccineInterface, EntityFormTypeInterface
{
    use SoftDeletableTrait,
        TimestampableTrait;

    protected $id;
    protected $title;
    protected $description;
    protected $translations;
    protected $locale;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

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
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param VaccineTranslation $t
     */
    public function addTranslation(VaccineTranslation $t)
    {
        if (!$this->translations->contains($t)) {
            $this->translations[] = $t;
            $t->setObject($this);
        }
    }

    /**
     * @param VaccineTranslation $t
     */
    public function removeTranslation(VaccineTranslation $t)
    {
        if ($this->translations->contains($t)) {
            $this->translations->removeElement($t);
        }
    }

    /**
     * @return array
     */
    public function getEntityFormTypeData()
    {
        return array(
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
        );
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
