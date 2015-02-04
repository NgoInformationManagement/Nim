<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Nim\Component\Behat;

use Behat\Gherkin\Node\TableNode;
use Symfony\Component\PropertyAccess\StringUtil;

class FixtureContext extends BaseContext
{
    /**
     * @Given /^there are the following ([^"]*):$/
     */
    public function thereAreFollowingResources($resource, TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsResource($resource, $data);
        }
    }

    /**
     * @Given /^there is the following "([^"]*)":$/
     */
    public function thereIsResource($resource, $additionalData)
    {
        if ($additionalData instanceof TableNode) {
            $additionalData = $additionalData->getHash();
        }

        $entity = $this->getRepository($resource)->createNew();

        if (count($additionalData) > 0) {
            $this->setDataToObject($entity, $additionalData);
        }

        return $this->persistAndFlush($entity);
    }

    /**
     * @Given /^There are no ([^"]*)$/
     */
    public function thereAreNoResources($type)
    {
//        if ($type == 'vaccines') {
//            $type = 'vaccine';
//        } else {
            $type = str_replace(' ', '_', StringUtil::singularify($type));
//        }


        $manager = $this->getEntityManager();

        foreach ($this->getRepository($type)->findAll() as $resource) {
//            if ($resource instanceof AbstractEntity) {
//                $resource->setEmails(null);
//                $resource->setPhones(null);
//
//                $manager->persist($resource);
//                $manager->flush();
//            }
            $manager->remove($resource);
        }

        $manager->flush();
    }


}