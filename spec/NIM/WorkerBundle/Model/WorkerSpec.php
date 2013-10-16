<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\WorkerBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use NIM\WorkerBundle\Model\Agency;
use NIM\WorkerBundle\Model\Contact;
use NIM\WorkerBundle\Model\Email;
use NIM\WorkerBundle\Model\Phone;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WorkerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Worker');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_firstname_by_default()
    {
        $this->getFirstname()->shouldReturn(null);
    }

    function its_firstname_is_mutable()
    {
        $this->setFirstname('firstname');
        $this->getFirstname()->shouldReturn('firstname');
    }

    function it_has_no_lastname_by_default()
    {
        $this->getGender()->shouldReturn(null);
    }

    function its_lastname_is_mutable()
    {
        $this->setLastname('lastname');
        $this->getLastname()->shouldReturn('lastname');
    }

    function it_has_no_arrivedat_by_default()
    {
        $this->getArrivedAt()->shouldReturn(null);
    }

    function its_arrivedat_is_mutable(\DateTime $dateTime)
    {
        $this->setArrivedAt($dateTime);
        $this->getArrivedAt()->shouldReturn($dateTime);
    }

    function it_has_no_basedat_by_default()
    {
        $this->getBasedAt()->shouldReturn(null);
    }

    function its_basedat_is_mutable(Agency $agency)
    {
        $this->setBasedAt($agency);
        $this->getBasedAt()->shouldReturn($agency);
    }

    function it_has_no_birthday_by_default()
    {
        $this->getBirthday()->shouldReturn(null);
    }

    function its_birthday_is_mutable(\DateTime $dateTime)
    {
        $this->setBirthday($dateTime);
        $this->getBirthday()->shouldReturn($dateTime);
    }

    function it_has_no_contacts_by_default()
    {
        $this->getContacts()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function its_contacts_is_mutable(ArrayCollection $arrayCollection)
    {
        $this->setContacts($arrayCollection);
        $this->getContacts()->shouldReturn($arrayCollection);
    }

    function it_has_collection_of_contacts(Contact $contact1, Contact $contact2)
    {
        $this->addContact($contact1);
        $this->addContact($contact2);
        $this->getContacts()->shouldHaveCount(2);
    }

    function it_has_contacts(Contact $contact1, Contact $contact2)
    {
        $this->addContact($contact1);
        $this->addContact($contact2);
        $this->hasContacts()->shouldReturn(true);
    }

    function it_should_have_not_contacts_by_default()
    {
        $this->hasContacts()->shouldReturn(false);
    }

    function it_has_unique_contacts(Contact $contact)
    {
        $this->addContact($contact);
        $this->addContact($contact);
        $this->getContacts()->shouldHaveCount(1);
    }

    function it_can_remove_contacts(Contact $contact1, Contact $contact2)
    {
        $this->addContact($contact1);
        $this->addContact($contact2);

        $this->removeContact($contact2);
        $this->getContacts()->shouldHaveCount(1);
    }

    function it_has_no_diploma_by_default()
    {
        $this->getDiploma()->shouldReturn(null);
    }

    function its_diploma_is_mutable()
    {
        $this->setDiploma('diploma');
        $this->getDiploma()->shouldReturn('diploma');
    }

    function it_has_no_function_by_default()
    {
        $this->getFunction()->shouldReturn(null);
    }

    function its_function_is_mutable()
    {
        $this->setFunction('function');
        $this->getFunction()->shouldReturn('function');
    }

    function it_has_no_gender_by_default()
    {
        $this->getGender()->shouldReturn(null);
    }

    function its_gender_is_mutable()
    {
        $this->setGender('gender');
        $this->getGender()->shouldReturn('gender');
    }

    function it_has_no_leftAt_by_default()
    {
        $this->getLeftAt()->shouldReturn(null);
    }

    function its_leftAt_is_mutable(\DateTime $dateTime)
    {
        $this->setLeftAt($dateTime);
        $this->getLeftAt()->shouldReturn($dateTime);
    }

    function it_has_no_email_by_default()
    {
        $this->getEmails()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function its_email_is_mutable(ArrayCollection $col)
    {
        $this->setEmails($col);
        $this->getEmails()->shouldReturn($col);
    }

    function it_has_unique_emails(Email $email)
    {
        $this->addEmail($email);
        $this->addEmail($email);
        $this->getEmails()->shouldHaveCount(1);
    }

    function it_has_emails(Email $email1, Email $email2)
    {
        $this->addEmail($email1);
        $this->addEmail($email2);
        $this->getEmails()->shouldHaveCount(2);
    }

    function it_can_remove_emails(Email $email1, Email $email2)
    {
        $this->addEmail($email1);
        $this->addEmail($email2);

        $this->removeEmail($email2);
        $this->getEmails()->shouldHaveCount(1);
    }

    function it_has_no_phone_by_default()
    {
        $this->getPhones()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function its_phone_is_mutable(ArrayCollection $col)
    {
        $this->setPhones($col);
        $this->getPhones()->shouldReturn($col);
    }

    function it_has_unique_phones(Phone $phone)
    {
        $this->addPhone($phone);
        $this->addPhone($phone);
        $this->getPhones()->shouldHaveCount(1);
    }

    function it_has_phones(Phone $phone1, Phone $phone2)
    {
        $this->addPhone($phone1);
        $this->addPhone($phone2);
        $this->getPhones()->shouldHaveCount(2);
    }

    function it_can_remove_phones(Phone $phone1, Phone $phone2)
    {
        $this->addPhone($phone1);
        $this->addPhone($phone2);

        $this->removePhone($phone2);
        $this->getPhones()->shouldHaveCount(1);
    }

    function it_has_no_updatedAt_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    function its_updatedAt_is_mutable(\DateTime $dateTime)
    {
        $this->setUpdatedAt($dateTime);
        $this->getUpdatedAt()->shouldReturn($dateTime);
    }

    function it_has_no_createdat_by_default()
    {
        $this->getCreatedAt()->shouldReturn(null);
    }

    function its_createdat_is_mutable(\DateTime $dateTime)
    {
        $this->setCreatedAt($dateTime);
        $this->getCreatedAt()->shouldReturn($dateTime);
    }
}
