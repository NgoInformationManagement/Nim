<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Twig;

use \Symfony\Component\Intl\Intl;

class CountryExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('country', array($this, 'countryFilter')),
        );
    }

    /**
     * @param $code
     * @param  string $locale
     * @return mixed
     */
    public function countryFilter($code, $locale = null)
    {
        if (null !== $country = Intl::getRegionBundle()->getCountryName($code, $locale)) {
            return $country;
        }

        return $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nim_country';
    }
}
