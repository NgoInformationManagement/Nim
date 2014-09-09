<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{
    /**
     * Render filter form.
     *
     * @param $type
     * @param $path
     * @param  string   $template
     * @param  Request  $request
     * @return Response
     */
    public function filterAction(
        $type,
        $path,
        Request $request = null,
        $template = 'NIMWebBundle:Misc:filter.html.twig'
    ) {
        $openPanel = false;
        if (null !== $request && $request->query->has('criteria')) {
            $openPanel = true;
        }

        return $this->render($template, array(
            'openPanel' => $openPanel,
            'path' => $path,
            'form' => $this->get('form.factory')
                ->createNamed('criteria', $type)
                ->submit($request)
                ->createView()
        ));
    }
}
