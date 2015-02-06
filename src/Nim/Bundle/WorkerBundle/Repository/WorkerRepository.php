<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Repository;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class WorkerRepository extends EntityRepository
{
    public function getBasedNoWhereQuery()
    {
        $builder = $this->getCollectionQueryBuilder();
        $builder->where($builder->expr()->isNull($this->getAlias().'.basedAt'));

        return $builder;
    }

    protected function getAlias()
    {
        return 'w';
    }
}
