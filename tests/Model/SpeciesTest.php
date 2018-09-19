<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Exception\IucnApiException;
use PHPUnit\Framework\TestCase;

/**
 * Class SpeciesTest
 * @package KatTheWaffle\IucnApi\Model
 */
class SpeciesTest extends TestCase
{
    /**
     * @throws IucnApiException
     */
    public function testCreateFromJson(): void
    {
        $json = json_decode('{
            "assessor": "Lorem ipsum dolor sit amet",
            "authority": "Consectetur adipiscing elit",
            "category": "In laoreet egestas arcu eget congue",
            "class": "Aenean vitae pretium nisl",
            "criteria": "Duis vitae auctor nisl",
            "family": "Massa sit amet ultrices tristique",
            "genus": "Nunc lacus laoreet tortor",
            "kingdom": "Sed molestie nibh risus nec neque",
            "main_common_name": "Nam felis turpis",
            "order": "Etiam imperdiet tellus velit",
            "phylum": "Phasellus cursus lorem quam",
            "published_year": 2000,
            "reviewer": "Maecenas at hendrerit ligula",
            "scientific_name": "Maecenas ut sapien justo",
            "taxonid": 42785
        }');

        $species = Species::createFromJson($json);
        $this->assertInstanceOf(Species::class, $species);
        $this->assertEquals('Lorem ipsum dolor sit amet', $species->getAssessor());
        $this->assertEquals('Consectetur adipiscing elit', $species->getAuthority());
        $this->assertEquals('In laoreet egestas arcu eget congue', $species->getCategory());
        $this->assertEquals('Aenean vitae pretium nisl', $species->getClass());
        $this->assertEquals('Duis vitae auctor nisl', $species->getCriteria());
        $this->assertEquals('Massa sit amet ultrices tristique', $species->getFamily());
        $this->assertEquals('Nunc lacus laoreet tortor', $species->getGenus());
        $this->assertEquals('Sed molestie nibh risus nec neque', $species->getKingdom());
        $this->assertEquals('Nam felis turpis', $species->getMainCommonName());
        $this->assertEquals('Etiam imperdiet tellus velit', $species->getOrder());
        $this->assertEquals('Phasellus cursus lorem quam', $species->getPhylum());
        $this->assertEquals(2000, $species->getPublishedYear());
        $this->assertEquals('Maecenas at hendrerit ligula', $species->getReviewer());
        $this->assertEquals('Maecenas ut sapien justo', $species->getScientificName());
        $this->assertEquals(42785, $species->getTaxonId());
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