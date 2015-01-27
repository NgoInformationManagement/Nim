<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Model;

use Nim\Bundle\FormBundle\Model\Gender;
use PhpSpec\ObjectBehavior;

class GenderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Model\Gender');
    }

    public function it_should_return_gender_options()
    {
        $this::getOptions()->shouldReturn(
            array(
                Gender::MALE => 'gender.'.Gender::MALE,
                Gender::FEMALE => 'gender.'.Gender::FEMALE,
            )
        );
    }
}
