<?php

namespace spec\NIM\CoreBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MissionAssetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\CoreBundle\Model\MissionAsset');
    }

    function it_is_timestampable()
    {
        $this->shouldImplement('Sylius\Component\Resource\Model\TimestampableInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_file_by_default()
    {
        $this->getFile()->shouldReturn(null);
    }

    public function its_file_is_mutable()
    {
        $this->setFile('path/photo.jpg')->shouldReturn($this);
        $this->getFile()->shouldReturn('path/photo.jpg');
    }
}

