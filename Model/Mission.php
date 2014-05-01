<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\MissionBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use \Gedmo\Translatable\Translatable;
use NIM\FormBundle\Model\Core\SoftDeletableTrait;
use NIM\FormBundle\Model\Core\TimestampableTrait;
use NIM\MissionBundle\Model\Core\MissionInterface;
use NIM\WorkerBundle\Model\Core\WorkerInterface;
use NIM\WorkerBundle\Model\Worker;

class Mission implements Translatable, MissionInterface
{
    use SoftDeletableTrait,
        TimestampableTrait;

    protected $id;
    protected $title;
    protected $description;
    protected $country;
    protected $startedAt;
    protected $endedAt;
    protected $workers;
    protected $translations;
    protected $locale;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->workers = new ArrayCollection();
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
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
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
    public function setEndedAt(\DateTime $endedAt = null)
    {
        $this->endedAt = $endedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setStartedAt(\DateTime $startedAt = null)
    {
        $this->startedAt = $startedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getStartedAt()
    {
        return $this->startedAt;
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
     * @param MissionTranslation $t
     */
    public function addTranslation(MissionTranslation $t)
    {
        if (!$this->translations->contains($t)) {
            $this->translations[] = $t;
            $t->setObject($this);
        }
    }

    /**
     * @param MissionTranslation $t
     */
    public function removeTranslation(MissionTranslation $t)
    {
        if ($this->translations->contains($t)) {
            $this->translations->removeElement($t);
        }
    }

    /**
     * @param mixed $workers
     */
    public function setWorkers($workers)
    {
        $this->workers = $workers;
    }

    /**
     * @param  WorkerInterface $worker
     * @return $this
     */
    public function addWorker(WorkerInterface $worker)
    {
        if (!$this->getWorkers()->contains($worker)) {
            $worker->addMission($this);
            $this->getWorkers()->add($worker);
        }

        return $this;
    }

    /**
     * @param WorkerInterface $worker
     */
    public function removeWorker(WorkerInterface $worker)
    {
        if ($this->getWorkers()->contains($worker)) {
            $this->getWorkers()->removeElement($worker);
        }
    }

    /**
     * @return mixed
     */
    public function getWorkers()
    {
        return $this->workers;
    }

    /**
     * @return array
     */
    public function getEntityFormTypeData()
    {
        return array(
            'title' => $this->getTitle(),
            'country' => $this->getCountry(),
            'started_at' => $this->getStartedAt(),
            'ended_at' => $this->getEndedAt()
        );
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
