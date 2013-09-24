<?php

namespace spec\NIM\MissionBundle\Model;

use NIM\MissionBundle\Model\MissionTranslation;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MissionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\MissionBundle\Model\Mission');
    }

    function it_should_implement_gedmo_interface_translable()
    {
        $this->shouldImplement('\Gedmo\Translatable\Translatable');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_country_by_default()
    {
        $this->getCountry()->shouldReturn(null);
    }

    function its_country_is_mutable()
    {
        $this->setCountry('EN');
        $this->getCountry()->shouldReturn('EN');
    }

    function it_has_no_description_by_default()
    {
        $this->getDescription()->shouldReturn(null);
    }

    function its_description_is_mutable()
    {
        $this->setDescription('desciption');
        $this->getDescription()->shouldReturn('desciption');
    }

    function it_has_no_title_by_default()
    {
        $this->getTitle()->shouldReturn(null);
    }

    function its_title_is_mutable()
    {
        $this->setTitle('title');
        $this->getTitle()->shouldReturn('title');
    }

    function it_has_no_endedat_by_default()
    {
        $this->getEndedAt()->shouldReturn(null);
    }

    function its_endedat_is_mutable()
    {
        $this->setEndedAt('2000-01-01');
        $this->getEndedAt()->shouldReturn('2000-01-01');
    }

    function it_has_no_startedat_by_default()
    {
        $this->getStartedAt()->shouldReturn(null);
    }

    function its_startedat_is_mutable()
    {
        $this->setStartedAt('2000-01-01');
        $this->getStartedAt()->shouldReturn('2000-01-01');
    }

    function it_has_no_locale_by_default()
    {
        $this->getLocale()->shouldReturn(null);
    }

    function its_locale_is_mutable()
    {
        $this->setLocale('en');
        $this->getLocale()->shouldReturn('en');
    }

    function it_has_no_translations_by_default()
    {
        $this->getTranslations()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_should_add_translations(MissionTranslation $translation)
    {
        $translation->setObject($this)->shouldBeCalled();

        $this->addTranslation($translation);
        $this->getTranslations()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_should_remove_translations(MissionTranslation $translation)
    {
        $this->it_should_add_translations($translation);

        $this->removeTranslation($translation);

        $this->getTranslations()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }
}
