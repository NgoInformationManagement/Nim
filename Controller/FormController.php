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
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{
    /**
     * Render filter form.
     *
     * @param string $type
     * @param string $path
     * @param string $template
     * @return Response
     */
    public function filterAction($type, $path, $template = 'NIMWebBundle:Misc:filter.html.twig')
    {
        return $this->render($template, array(
            'path' => $path,
            'form' => $this->get('form.factory')->createNamed('criteria', $type)->createView()
        ));
    }
}
