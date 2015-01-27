<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WorkerBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Nim\Bundle\WorkerBundle\Model\Phone;
use Nim\Bundle\WorkerBundle\Model\Email;
use PhpSpec\ObjectBehavior;

class ContactSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Model\Contact');
    }

    public function it_should_implement_contact_interface()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Model\ContactInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_firstname_by_default()
    {
        $this->getFirstname()->shouldReturn(null);
    }

    public function its_firstname_is_mutable()
    {
        $this->setFirstname('firstname');
        $this->getFirstname()->shouldReturn('firstname');
    }

    public function it_has_no_lastname_by_default()
    {
        $this->getLastname()->shouldReturn(null);
    }

    public function its_lastname_is_mutable()
    {
        $this->setLastname('lastname');
        $this->getLastname()->shouldReturn('lastname');
    }

    public function it_has_no_city_by_default()
    {
        $this->getCity()->shouldReturn(null);
    }

    public function its_city_is_mutable()
    {
        $this->setCity('city');
        $this->getCity()->shouldReturn('city');
    }

    public function it_has_no_country_by_default()
    {
        $this->getCountry()->shouldReturn(null);
    }

    public function its_country_is_mutable()
    {
        $this->setCountry('country');
        $this->getCountry()->shouldReturn('country');
    }

    public function it_has_no_postcode_by_default()
    {
        $this->getPostcode()->shouldReturn(null);
    }

    public function its_postcode_is_mutable()
    {
        $this->setPostcode('postcode');
        $this->getPostcode()->shouldReturn('postcode');
    }

    public function it_has_no_street_by_default()
    {
        $this->getStreet()->shouldReturn(null);
    }

    public function its_street_is_mutable()
    {
        $this->setStreet('street');
        $this->getStreet()->shouldReturn('street');
    }

    public function it_has_no_email_by_default()
    {
        $this->getEmails()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function its_email_is_mutable(ArrayCollection $col)
    {
        $this->setEmails($col);
        $this->getEmails()->shouldReturn($col);
    }

    public function it_have_unique_emails(Email $email)
    {
        $this->addEmail($email);
        $this->addEmail($email);
        $this->getEmails()->shouldHaveCount(1);
    }

    public function it_have_emails(Email $email1, Email $email2)
    {
        $this->addEmail($email1);
        $this->addEmail($email2);
        $this->getEmails()->shouldHaveCount(2);
    }

    public function it_can_remove_emails(Email $email1, Email $email2)
    {
        $this->addEmail($email1);
        $this->addEmail($email2);

        $this->removeEmail($email2);
        $this->getEmails()->shouldHaveCount(1);
    }

    public function it_has_no_phone_by_default()
    {
        $this->getPhones()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function its_phone_is_mutable(ArrayCollection $col)
    {
        $this->setPhones($col);
        $this->getPhones()->shouldReturn($col);
    }

    public function it_have_unique_phones(Phone $phone)
    {
        $this->addPhone($phone);
        $this->addPhone($phone);
        $this->getPhones()->shouldHaveCount(1);
    }

    public function it_have_phones(Phone $phone1, Phone $phone2)
    {
        $this->addPhone($phone1);
        $this->addPhone($phone2);
        $this->getPhones()->shouldHaveCount(2);
    }

    public function it_can_remove_phones(Phone $phone1, Phone $phone2)
    {
        $this->addPhone($phone1);
        $this->addPhone($phone2);

        $this->removePhone($phone2);
        $this->getPhones()->shouldHaveCount(1);
    }

    public function it_has_no_createdat_by_default()
    {
        $this->getCreatedAt()->shouldReturn(null);
    }

    public function its_createdat_is_mutable(\DateTime $dateTime)
    {
        $this->setCreatedAt($dateTime);
        $this->getCreatedAt()->shouldReturn($dateTime);
    }

    public function it_has_no_updatedat_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    public function its_updatedat_is_mutable(\DateTime $dateTime)
    {
        $this->setUpdatedAt($dateTime);
        $this->getUpdatedAt()->shouldReturn($dateTime);
    }
}
