<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Behat;

use Faker\Factory as FakerFactory;
use Behat\Behat\Context\BehatContext;
use Behat\MinkExtension\Context\MinkDictionary;
use Behat\Symfony2Extension\Context\KernelDictionary;
use NIM\WebBundle\Behat\UserContext\CollectionContext;
use NIM\WebBundle\Behat\DataContext\AgencyDataContext;
use NIM\WebBundle\Behat\DataContext\BaseDataContext;
use NIM\WebBundle\Behat\DataContext\ContactDataContext;
use NIM\WebBundle\Behat\DataContext\MissionDataContext;
use NIM\WebBundle\Behat\DataContext\WorkerDataContext;
use NIM\WebBundle\Behat\UserContext\AccountUserContext;
use NIM\WebBundle\Behat\UserContext\BaseUserContext;
use NIM\FormBundle\Behat\FormCollectionTrait;

class FeatureContext extends BehatContext
{
    use MinkDictionary,
        KernelDictionary,
        BaseDataContext,
        BaseUserContext,
        MissionDataContext,
        AccountUserContext,
        AgencyDataContext,
        WorkerDataContext,
        ContactDataContext;

    /**
     * Faker.
     *
     * @var Generator
     */
    private $faker;

    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->faker = FakerFactory::create(); // todo
        $this->useContext('collection-type', new CollectionContext());
    }

    /**
     * Get service by id.
     *
     * @param  string $id
     * @return object
     */
    private function getService($id)
    {
        return $this->getContainer()->get($id);
    }
}
