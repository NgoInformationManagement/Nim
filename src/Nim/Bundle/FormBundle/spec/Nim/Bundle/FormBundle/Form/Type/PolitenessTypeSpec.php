<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Form\Type;

use Nim\Bundle\FormBundle\Model\Politeness;
use PhpSpec\ObjectBehavior;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PolitenessTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Type\PolitenessType');
    }

    public function it_should_extends_symfony_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => Politeness::getOptions()
        ));

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_button_as_parent()
    {
        $this->getParent()->shouldReturn('choice');
    }

    public function it_should_have_delete_as_name()
    {
        $this->getName()->shouldReturn('politeness');
    }
}
