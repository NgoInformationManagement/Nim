<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Model;

use NIM\FormBundle\Model\Politeness;
use PhpSpec\ObjectBehavior;

class PolitnessSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Model\Politeness');
    }

    public function it_should_return_gender_options()
    {
        $this::getOptions()->shouldReturn(
            array(
                Politeness::MADAM => 'politeness.'.Politeness::MISS,
                Politeness::MISS => 'politeness.'.Politeness::MISS,
                Politeness::MISTER => 'politeness'.Politeness::MISTER,
            )
        );
    }
}
