<?php

namespace EC\Poetry\Tests\Services\Parsers\Components;

use EC\Poetry\Tests\AbstractTest;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ReferenceDocumentParserTest
 *
 * @package EC\Poetry\Tests\Services\Parsers\Components
 */
class ReferenceDocumentParserTest extends AbstractTest
{
    /**
     * Test parsing.
     *
     * @param string $xml
     * @param array  $fixtures
     *
     * @dataProvider parserProvider
     */
    public function testParsing($xml, $fixtures)
    {
        /** @var \EC\Poetry\Parsers\Components\ReferenceDocumentParser $parser */
        $parser = $this->getContainer()->get('parser.component.referenceDocument');
        $components = $parser->parse($xml);

        foreach ($fixtures as $method => $value) {
            expect($components[0]->$method())->to->equal($value);
        }
    }

    /**
     * @return mixed
     */
    public function parserProvider()
    {
        return Yaml::parse($this->getFixture('parsers/components/referenceDocument.yml'));
    }
}
