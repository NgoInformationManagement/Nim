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
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        /** @var $missionRepository EntityRepository $missionRepository */
        $missionRepository = $this->get('nim.repository.mission');
        /** @var $workerRepository EntityRepository $missionRepository */
        $workerRepository = $this->get('nim.repository.worker');

        return array(
            'missions' => $missionRepository->findBy(array(), array('updatedAt' => 'desc'), 5),
            'workers' => $workerRepository->findBy(array(), array('updatedAt' => 'desc'), 5),
        );
    }
}
