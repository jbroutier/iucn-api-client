<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Exception\IucnApiException;
use PHPUnit\Framework\TestCase;

/**
 * Class ThreatTest
 * @package KatTheWaffle\IucnApi\Model
 */
class ThreatTest extends TestCase
{
    /**
     * @throws IucnApiException
     */
    public function testCreateFromJson(): void
    {
        $json = json_decode('{
            "code": "Lorem ipsum dolor sit amet",
            "invasive": "Consectetur adipiscing elit",
            "scope": "In laoreet egestas arcu eget congue",
            "score": "Aenean vitae pretium nisl",
            "severity": "Duis vitae auctor nisl",
            "timing": "Massa sit amet ultrices tristique",
            "title": "Nunc lacus laoreet tortor"
        }');

        $threat = Threat::createFromJson($json);
        $this->assertInstanceOf(Threat::class, $threat);
        $this->assertEquals('Lorem ipsum dolor sit amet', $threat->getCode());
        $this->assertEquals('Consectetur adipiscing elit', $threat->getInvasive());
        $this->assertEquals('In laoreet egestas arcu eget congue', $threat->getScope());
        $this->assertEquals('Aenean vitae pretium nisl', $threat->getScore());
        $this->assertEquals('Duis vitae auctor nisl', $threat->getSeverity());
        $this->assertEquals('Massa sit amet ultrices tristique', $threat->getTiming());
        $this->assertEquals('Nunc lacus laoreet tortor', $threat->getTitle());
    }

    /**
     * @throws IucnApiException
     */
    public function testThrowsExceptionOnInvalidData(): void
    {
        $json = json_decode('{
            "error": "Lorem ipsum dolor sit amet"
        }');

        $this->expectException(IucnApiException::class);
        Species::createFromJson($json);
    }
}