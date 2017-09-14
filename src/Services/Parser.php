<?php

namespace EC\Poetry\Services;

use Symfony\Component\DomCrawler;

/**
 * Class Crawler
 *
 * @package EC\Poetry\Services
 */
class Parser extends DomCrawler\Crawler
{
    /**
     * Get node content given its xPath expression or null if none found.
     *
     * @param string $xpath
     *
     * @return string|null
     */
    public function getContent($xpath)
    {
        try {
            return $this->filterXPath($xpath)->html();
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }

    /**
     * Get node attribute given its xPath expression or null if none found.
     *
     * @param string $xpath
     * @param string $attribute
     *
     * @return string|null
     */
    public function getAttribute($xpath, $attribute)
    {
        $attributes = $this->filterXPath($xpath)->extract([$attribute]);

        return $attributes[0] === '' ? null : $attributes[0];
    }
}