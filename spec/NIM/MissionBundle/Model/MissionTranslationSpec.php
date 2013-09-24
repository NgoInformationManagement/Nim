<?php

namespace spec\NIM\MissionBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MissionTranslationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\MissionBundle\Model\MissionTranslation');
    }

    function it_should_extend_personnal_translation()
    {
        $this->shouldHaveType('Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation');
    }
}
