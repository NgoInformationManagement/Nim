<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\WorkerBundle\Model\Core\Worker;

use PhpSpec\ObjectBehavior;

class WorkerTypesSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Worker\WorkerTypes');
    }

    public function it_should_implement_constant_interface()
    {
        $this->shouldHaveType('NIM\FormBundle\Model\ConstantInterface');
    }

    public function it_should_return_all_phone_types()
    {
        $this::getTypes('translationDomain')->shouldReturn(array(
            'employee' => 'translationDomain.employee',
            'volunteer' => 'translationDomain.volunteer' ,
            'intern' => 'translationDomain.intern'
        ));
    }
}
