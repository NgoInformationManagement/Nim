<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WebBundle\Behat;

use Faker\Factory as FakerFactory;
use Behat\Behat\Context\BehatContext;
use Behat\MinkExtension\Context\MinkDictionary;
use Behat\Symfony2Extension\Context\KernelDictionary;
use Nim\Bundle\WebBundle\Behat\DataContext\VaccineDataContext;
use Nim\Bundle\WebBundle\Behat\UserContext\CollectionContext;
use Nim\Bundle\WebBundle\Behat\DataContext\AgencyDataContext;
use Nim\Bundle\WebBundle\Behat\DataContext\BaseDataContext;
use Nim\Bundle\WebBundle\Behat\DataContext\ContactDataContext;
use Nim\Bundle\WebBundle\Behat\DataContext\MissionDataContext;
use Nim\Bundle\WebBundle\Behat\DataContext\WorkerDataContext;
use Nim\Bundle\WebBundle\Behat\UserContext\AccountUserContext;
use Nim\Bundle\WebBundle\Behat\UserContext\BaseUserContext;

class FeatureContext extends BehatContext
{
    use MinkDictionary,
        KernelDictionary,
        BaseDataContext,
        BaseUserContext,
        MissionDataContext,
        VaccineDataContext,
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
        $this->faker = FakerFactory::create();
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
