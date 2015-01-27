<?php

namespace spec\Nim\Bundle\VaccineBundle\Model;

use PhpSpec\ObjectBehavior;

class VaccineTranslationSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\VaccineBundle\Model\VaccineTranslation');
    }

    public function it_should_extend_personnal_translation()
    {
        $this->shouldHaveType('Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation');
    }
}
