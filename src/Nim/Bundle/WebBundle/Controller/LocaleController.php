<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WebBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LocaleController extends Controller
{
    public function indexAction()
    {
        return $this->render('NimWebBundle:Locale:index.html.twig', [
            'form' => $this->createForm('nim_locale')->createView()
        ]);
    }

    public function updateAction(Request $request)
    {
        $form = $this->createForm('nim_locale');

        if ($request->isMethod('POST') && $form->submit($request)) {
            $locale = $form->get('locale')->getData();
            $this->get('session')->set('_locale', $locale);
        }

        return $this->redirect($request->headers->get('referer'));
    }
}
