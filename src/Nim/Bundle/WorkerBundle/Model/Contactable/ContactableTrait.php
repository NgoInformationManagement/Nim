<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Model\Contactable;

use Doctrine\Common\Collections\ArrayCollection;
use Nim\Bundle\WorkerBundle\Model\Email;
use Nim\Bundle\WorkerBundle\Model\Phone;

trait ContactableTrait
{
    protected $phones;
    protected $emails;

    /**
     * @param ArrayCollection $emails
     */
    public function setEmails(ArrayCollection $emails = null)
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
     * @param \Nim\Bundle\WorkerBundle\Model\Email $email
     */
    public function addEmail(Email $email)
    {
        if (!$this->getEmails()->contains($email)) {
            $this->getEmails()->add($email);
        }
    }

    /**
     * @param \Nim\Bundle\WorkerBundle\Model\Email $email
     */
    public function removeEmail(Email $email)
    {
        if ($this->getEmails()->contains($email)) {
            $this->getEmails()->removeElement($email);
        }
    }

    /**
     * @param ArrayCollection $phones
     */
    public function setPhones(ArrayCollection $phones = null)
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
     * @param Phone $phone
     */
    public function addPhone(Phone $phone)
    {
        if (!$this->getPhones()->contains($phone)) {
            $this->getPhones()->add($phone);
        }
    }

    /**
     * @param Phone $phone
     */
    public function removePhone(Phone $phone)
    {
        if ($this->getPhones()->contains($phone)) {
            $this->getPhones()->removeElement($phone);
        }
    }
}
