<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\CoreBundle\EventListener;

use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class LocaleListenerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('en');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\CoreBundle\EventListener\LocaleListener');
    }

    public function it_should_implement_event_subscriber()
    {
        $this->shouldImplement('Symfony\Component\EventDispatcher\EventSubscriberInterface');
    }

    public function it_should_manage_locale_from_the_route_configuration(
        GetResponseEvent $event,
        Request $request,
        SessionInterface $session,
        ParameterBag $parameterBag
    ) {
        $session->set('_locale', 'fr')->shouldBeCalled();

        $parameterBag->get('_locale')->willReturn('fr');
        $request->attributes = $parameterBag;

        $request->getSession()->willReturn($session);
        $request->hasPreviousSession()->willReturn(true);

        $event->getRequest()->willReturn($request);

        $this->onKernelRequest($event);
    }

    public function it_should_manage_locale_from_the_session(
        GetResponseEvent $event,
        Request $request,
        SessionInterface $session,
        ParameterBag $parameterBag
    ) {
        $session->get('_locale', 'en')->willReturn('fr');

        $parameterBag->get('_locale')->willReturn(null);
        $request->attributes = $parameterBag;

        $request->getSession()->willReturn($session);
        $request->hasPreviousSession()->willReturn(true);
        $request->setLocale('fr')->willReturn(true);

        $event->getRequest()->willReturn($request);

        $this->onKernelRequest($event);
    }

    public function it_has_event()
    {
        $this::getSubscribedEvents()->shouldReturn(array(
            KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
        ));
    }
}
