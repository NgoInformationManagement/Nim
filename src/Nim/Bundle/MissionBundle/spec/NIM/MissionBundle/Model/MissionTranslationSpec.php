<?php

namespace spec\Nim\Bundle\MissionBundle\Model;

use PhpSpec\ObjectBehavior;

class MissionTranslationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\MissionBundle\Model\MissionTranslation');
    }

    public function it_should_extend_personnal_translation()
    {
        $this->shouldHaveType('Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation');
    }
}
