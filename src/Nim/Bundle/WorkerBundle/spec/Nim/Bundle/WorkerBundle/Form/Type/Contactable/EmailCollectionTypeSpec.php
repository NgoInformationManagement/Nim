<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WorkerBundle\Form\Type\Contactable;

use PhpSpec\ObjectBehavior;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailCollectionTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(array('validation_group'));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Form\Type\Contactable\EmailCollectionType');
    }

    public function it_should_configure_the_form(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'type' => 'nim_email',
            'label' => 'worker.field.email.label',
            'allow_add' => true,
            'allow_delete' => true,
            'error_bubbling' => false,
            'validation_groups' => array('validation_group'),
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_email_collection');
    }

    public function it_should_a_parent()
    {
        $this->getParent()->shouldReturn('collection');
    }
}
