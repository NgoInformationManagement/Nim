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

use Doctrine\Common\Collections\ArrayCollection;
use NIM\WorkerBundle\Model\Email;
use NIM\WorkerBundle\Model\Phone;

trait ContactableTrait
{
    protected $phones;
    protected $emails;

    /**
     * @param mixed $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return ArrayCollection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param \NIM\WorkerBundle\Model\Email $email
     */
    public function addEmail(Email $email)
    {
        if (!$this->getEmails()->contains($email)) {
            $this->getEmails()->add($email);
        }
    }

    /**
     * @param \NIM\WorkerBundle\Model\Email $email
     */
    public function removeEmail(Email $email)
    {
        if ($this->getEmails()->contains($email)) {
            $this->getEmails()->removeElement($email);
        }
    }

    /**
     * @param mixed $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @return ArrayCollection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param \NIM\WorkerBundle\Model\Phone $phone
     */
    public function addPhone(Phone $phone)
    {
        if (!$this->getPhones()->contains($phone)) {
            $this->getPhones()->add($phone);
        }
    }

    /**
     * @param \NIM\WorkerBundle\Model\Phone $phone
     */
    public function removePhone(Phone $phone)
    {
        if ($this->getPhones()->contains($phone)) {
            $this->getPhones()->removeElement($phone);
        }
    }
}
