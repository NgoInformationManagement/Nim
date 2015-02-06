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

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        /** @var $missionRepository EntityRepository $missionRepository */
        $missionRepository = $this->get('nim.repository.mission');
        /** @var $workerRepository EntityRepository $missionRepository */
        $workerRepository = $this->get('nim.repository.worker');

        return $this->render('NimWebBundle:Dashboard:index.html.twig', [
            'missions' => $missionRepository->findBy([], ['updatedAt' => 'desc'], 5),
            'workers' => $workerRepository->findBy([], ['updatedAt' => 'desc'], 5),
        ]);
    }
}
