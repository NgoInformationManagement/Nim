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
use NIM\MissionBundle\Model\Mission;
use NIM\VaccineBundle\Model\Vaccine;
use NIM\WorkerBundle\Model\Agency;
use NIM\WorkerBundle\Model\Contact;
use NIM\WorkerBundle\Model\Email;
use NIM\WorkerBundle\Model\Passport;
use NIM\WorkerBundle\Model\Phone;
use NIM\WorkerBundle\Model\Visa;
use PhpSpec\ObjectBehavior;

class WorkerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Worker');
    }

    public function it_should_implement_worker_interface()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Core\WorkerInterface');
    }

    public function it_should_implement_entity_form_type_interface()
    {
        $this->shouldImplement('NIM\FormBundle\Model\Core\EntityFormTypeInterface');
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
        $this->getGender()->shouldReturn(null);
    }

    public function its_lastname_is_mutable()
    {
        $this->setLastname('lastname');
        $this->getLastname()->shouldReturn('lastname');
    }

    public function it_has_no_arrivedat_by_default()
    {
        $this->getArrivedAt()->shouldReturn(null);
    }

    public function its_arrivedat_is_mutable(\DateTime $dateTime)
    {
        $this->setArrivedAt($dateTime);
        $this->getArrivedAt()->shouldReturn($dateTime);
    }

    public function it_has_no_basedat_by_default()
    {
        $this->getBasedAt()->shouldReturn(null);
    }

    public function its_basedat_is_mutable(Agency $agency)
    {
        $this->setBasedAt($agency);
        $this->getBasedAt()->shouldReturn($agency);
    }

    public function it_has_no_birthday_by_default()
    {
        $this->getBirthday()->shouldReturn(null);
    }

    public function its_birthday_is_mutable(\DateTime $dateTime)
    {
        $this->setBirthday($dateTime);
        $this->getBirthday()->shouldReturn($dateTime);
    }

    public function it_has_no_contacts_by_default()
    {
        $this->getContacts()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function its_contacts_is_mutable(ArrayCollection $arrayCollection)
    {
        $this->setContacts($arrayCollection);
        $this->getContacts()->shouldReturn($arrayCollection);
    }

    public function it_has_collection_of_contacts(Contact $contact1, Contact $contact2)
    {
        $this->addContact($contact1);
        $this->addContact($contact2);
        $this->getContacts()->shouldHaveCount(2);
    }

    public function it_has_contacts(Contact $contact1, Contact $contact2)
    {
        $this->addContact($contact1);
        $this->addContact($contact2);
        $this->hasContacts()->shouldReturn(true);
    }

    public function it_should_have_not_contacts_by_default()
    {
        $this->hasContacts()->shouldReturn(false);
    }

    public function it_has_unique_contacts(Contact $contact)
    {
        $this->addContact($contact);
        $this->addContact($contact);
        $this->getContacts()->shouldHaveCount(1);
    }

    public function it_can_remove_contacts(Contact $contact1, Contact $contact2)
    {
        $this->addContact($contact1);
        $this->addContact($contact2);

        $this->removeContact($contact2);
        $this->getContacts()->shouldHaveCount(1);
    }

    public function it_has_no_diploma_by_default()
    {
        $this->getDiploma()->shouldReturn(null);
    }

    public function its_diploma_is_mutable()
    {
        $this->setDiploma('diploma');
        $this->getDiploma()->shouldReturn('diploma');
    }

    public function it_has_no_function_by_default()
    {
        $this->getFunction()->shouldReturn(null);
    }

    public function its_function_is_mutable()
    {
        $this->setFunction('function');
        $this->getFunction()->shouldReturn('function');
    }

    public function it_has_no_gender_by_default()
    {
        $this->getGender()->shouldReturn(null);
    }

    public function its_gender_is_mutable()
    {
        $this->setGender('gender');
        $this->getGender()->shouldReturn('gender');
    }

    public function it_has_no_leftAt_by_default()
    {
        $this->getLeftAt()->shouldReturn(null);
    }

    public function its_leftAt_is_mutable(\DateTime $dateTime)
    {
        $this->setLeftAt($dateTime);
        $this->getLeftAt()->shouldReturn($dateTime);
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

    public function it_has_unique_emails(Email $email)
    {
        $this->addEmail($email);
        $this->addEmail($email);
        $this->getEmails()->shouldHaveCount(1);
    }

    public function it_has_emails(Email $email1, Email $email2)
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

    public function it_has_unique_phones(Phone $phone)
    {
        $this->addPhone($phone);
        $this->addPhone($phone);
        $this->getPhones()->shouldHaveCount(1);
    }

    public function it_has_phones(Phone $phone1, Phone $phone2)
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

    public function it_has_no_passport_by_default()
    {
        $this->getPassports()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function its_passport_is_mutable(ArrayCollection $col)
    {
        $this->setPassports($col);
        $this->getPassports()->shouldReturn($col);
    }

    public function it_has_unique_passports(Passport $passport)
    {
        $this->addPassport($passport);
        $this->addPassport($passport);
        $this->getPassports()->shouldHaveCount(1);
    }

    public function it_has_passports(Passport $passport1, Passport $passport2)
    {
        $this->addPassport($passport1);
        $this->addPassport($passport2);
        $this->getPassports()->shouldHaveCount(2);
    }

    public function it_can_remove_passports(Passport $passport1, Passport $passport2)
    {
        $this->addPassport($passport1);
        $this->addPassport($passport2);

        $this->removePassport($passport2);
        $this->getPassports()->shouldHaveCount(1);
    }

    public function its_mission_is_mutable(ArrayCollection $col)
    {
        $this->setMissions($col);
        $this->getMissions()->shouldReturn($col);
    }

    public function it_has_unique_missions(Mission $mission)
    {
        $this->addMission($mission);
        $this->addMission($mission);
        $this->getMissions()->shouldHaveCount(1);
    }

    public function it_has_missions(Mission $mission1, Mission $mission2)
    {
        $this->addMission($mission1);
        $this->addMission($mission2);
        $this->getMissions()->shouldHaveCount(2);
    }

    public function it_can_remove_missions(Mission $mission1, Mission $mission2)
    {
        $this->addMission($mission1);
        $this->addMission($mission2);

        $this->removeMission($mission2);
        $this->getMissions()->shouldHaveCount(1);
    }

    public function it_has_no_visa_by_default()
    {
        $this->getVisas()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function its_visa_is_mutable(ArrayCollection $col)
    {
        $this->setVisas($col);
        $this->getVisas()->shouldReturn($col);
    }

    public function it_has_unique_visas(Visa $visa)
    {
        $this->addVisa($visa);
        $this->addVisa($visa);
        $this->getVisas()->shouldHaveCount(1);
    }

    public function it_has_visas(Visa $visa1, Visa $visa2)
    {
        $this->addVisa($visa1);
        $this->addVisa($visa2);
        $this->getVisas()->shouldHaveCount(2);
    }

    public function it_can_remove_visas(Visa $visa1, Visa $visa2)
    {
        $this->addVisa($visa1);
        $this->addVisa($visa2);

        $this->removeVisa($visa2);
        $this->getVisas()->shouldHaveCount(1);
    }

    public function it_has_no_vaccines_by_default()
    {
        $this->getVaccines()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function its_vaccines_is_mutable(ArrayCollection $arrayCollection)
    {
        $this->setVaccines($arrayCollection);
        $this->getVaccines()->shouldReturn($arrayCollection);
    }

    public function it_has_collection_of_vaccines(Vaccine $vaccine1, Vaccine $vaccine2)
    {
        $this->addVaccine($vaccine1);
        $this->addVaccine($vaccine2);
        $this->getVaccines()->shouldHaveCount(2);
    }

    public function it_has_vaccines(Vaccine $vaccine1, Vaccine $vaccine2)
    {
        $this->addVaccine($vaccine1);
        $this->addVaccine($vaccine2);
        $this->hasVaccines()->shouldReturn(true);
    }

    public function it_should_have_not_vaccines_by_default()
    {
        $this->hasVaccines()->shouldReturn(false);
    }

    public function it_has_unique_vaccines(Vaccine $vaccine)
    {
        $this->addVaccine($vaccine);
        $this->addVaccine($vaccine);
        $this->getVaccines()->shouldHaveCount(1);
    }

    public function it_can_remove_vaccines(Vaccine $vaccine1, Vaccine $vaccine2)
    {
        $this->addVaccine($vaccine1);
        $this->addVaccine($vaccine2);

        $this->removeVaccine($vaccine2);
        $this->getVaccines()->shouldHaveCount(1);
    }

    public function it_has_no_updatedAt_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    public function its_updatedAt_is_mutable(\DateTime $dateTime)
    {
        $this->setUpdatedAt($dateTime);
        $this->getUpdatedAt()->shouldReturn($dateTime);
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
}
