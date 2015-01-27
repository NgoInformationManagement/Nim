<?php

namespace spec\Nim\Bundle\MissionBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Nim\Bundle\MissionBundle\Model\MissionTranslation;
use PhpSpec\ObjectBehavior;

class MissionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\MissionBundle\Model\Mission');
    }

    public function it_should_implement_gedmo_interface_translable()
    {
        $this->shouldImplement('\Gedmo\Translatable\Translatable');
    }

    public function it_should_implement_mission_interface()
    {
        $this->shouldImplement('Nim\Bundle\MissionBundle\Model\MissionInterface');
    }

    public function it_should_implement_entity_form_type_interface()
    {
        $this->shouldImplement('Nim\Bundle\FormBundle\Model\Core\EntityFormTypeInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_country_by_default()
    {
        $this->getCountry()->shouldReturn(null);
    }

    public function its_country_is_mutable()
    {
        $this->setCountry('EN');
        $this->getCountry()->shouldReturn('EN');
    }

    public function it_has_no_description_by_default()
    {
        $this->getDescription()->shouldReturn(null);
    }

    public function its_description_is_mutable()
    {
        $this->setDescription('desciption');
        $this->getDescription()->shouldReturn('desciption');
    }

    public function it_has_no_title_by_default()
    {
        $this->getTitle()->shouldReturn(null);
    }

    public function its_title_is_mutable()
    {
        $this->setTitle('title');
        $this->getTitle()->shouldReturn('title');
    }

    public function it_has_no_endedat_by_default()
    {
        $this->getEndedAt()->shouldReturn(null);
    }

    public function its_endedat_is_mutable()
    {
        $date = new \DateTime('2000-01-01');
        $this->setEndedAt($date);
        $this->getEndedAt()->format('Y-m-d')
            ->shouldReturn('2000-01-01');
    }

    public function it_has_no_startedat_by_default()
    {
        $this->getStartedAt()->shouldReturn(null);
    }

    public function its_startedat_is_mutable()
    {
        $date = new \DateTime('2000-01-01');
        $this->setStartedAt($date);
        $this->getStartedAt()->format('Y-m-d')
            ->shouldReturn('2000-01-01');
    }

    public function it_has_no_locale_by_default()
    {
        $this->getLocale()->shouldReturn(null);
    }

    public function its_locale_is_mutable()
    {
        $this->setLocale('en');
        $this->getLocale()->shouldReturn('en');
    }

    public function it_has_no_translations_by_default()
    {
        $this->getTranslations()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function it_should_add_translations(MissionTranslation $translation)
    {
        $translation->setObject($this)->shouldBeCalled();

        $this->addTranslation($translation);
        $this->getTranslations()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    public function it_should_remove_translations(MissionTranslation $translation)
    {
        $this->it_should_add_translations($translation);

        $this->removeTranslation($translation);

        $this->getTranslations()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }
}
