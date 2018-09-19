<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Exception\IucnApiException;
use PHPUnit\Framework\TestCase;

/**
 * Class SpeciesNarrativeTextTest
 * @package KatTheWaffle\IucnApi\Model
 */
class SpeciesNarrativeTextTest extends TestCase
{
    /**
     * @throws IucnApiException
     */
    public function testCreateFromJson(): void
    {
        $json = json_decode('{
            "conservationmeasures": "Lorem ipsum dolor sit amet",
            "geographicrange": "Consectetur adipiscing elit",
            "habitat": "In laoreet egestas arcu eget congue",
            "population": "Aenean vitae pretium nisl",
            "populationtrend": "Duis vitae auctor nisl",
            "rationale": "Massa sit amet ultrices tristique",
            "taxonomicnotes": "Nunc lacus laoreet tortor",
            "threats": "Sed molestie nibh risus nec neque",
            "usetrade": "Nam felis turpis"
        }');

        $narrativeText = SpeciesNarrativeText::createFromJson($json);
        $this->assertInstanceOf(SpeciesNarrativeText::class, $narrativeText);
        $this->assertEquals('Lorem ipsum dolor sit amet', $narrativeText->getConservationMeasures());
        $this->assertEquals('Consectetur adipiscing elit', $narrativeText->getGeographicRange());
        $this->assertEquals('In laoreet egestas arcu eget congue', $narrativeText->getHabitat());
        $this->assertEquals('Aenean vitae pretium nisl', $narrativeText->getPopulation());
        $this->assertEquals('Duis vitae auctor nisl', $narrativeText->getPopulationTrend());
        $this->assertEquals('Massa sit amet ultrices tristique', $narrativeText->getRationale());
        $this->assertEquals('Nunc lacus laoreet tortor', $narrativeText->getTaxonomicNotes());
        $this->assertEquals('Sed molestie nibh risus nec neque', $narrativeText->getThreats());
        $this->assertEquals('Nam felis turpis', $narrativeText->getUseTrade());
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
        SpeciesNarrativeText::createFromJson($json);
    }
}