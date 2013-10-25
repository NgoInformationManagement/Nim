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

use NIM\FormBundle\Model\Gender;
use PhpSpec\ObjectBehavior;

class GenderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Model\Gender');
    }

    function it_should_return_gender_options()
    {
        $this::getOptions()->shouldReturn(
            array(
                Gender::MALE => 'gender.'.Gender::MALE,
                Gender::FEMALE => 'gender.'.Gender::FEMALE,
            )
        );
    }
}
