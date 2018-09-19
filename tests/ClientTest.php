<?php

namespace KatTheWaffle\IucnApi;

use KatTheWaffle\IucnApi\Model\Species;
use KatTheWaffle\IucnApi\Model\SpeciesAssessment;
use KatTheWaffle\IucnApi\Model\SpeciesNarrativeText;
use KatTheWaffle\IucnApi\Model\SpeciesOccurrence;
use KatTheWaffle\IucnApi\Model\Threat;
use KatTheWaffle\IucnApi\Exception\InvalidArgumentException;
use KatTheWaffle\IucnApi\Exception\InvalidTokenException;
use KatTheWaffle\IucnApi\Exception\IucnApiException;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 * @package KatTheWaffle\IucnApi
 */
class ClientTest extends TestCase
{
    public function testConstructor(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $this->assertInstanceOf(Client::class, $client);
    }

    /**
     * @throws IucnApiException
     */
    public function testThrowsExceptionOnInvalidToken(): void
    {
        $client = new Client('33a870eb4c30331ae69e064cb03abd25d47a716b52b647b84cb029bcef26cfd6');

        $this->expectException(InvalidTokenException::class);
        $client->getSpeciesByName('Loxodonta Africana');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesAssessmentsById(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $assessments = $client->getSpeciesAssessmentsById(12392);
        $this->assertInternalType('array', $assessments);
        $this->assertInstanceOf(SpeciesAssessment::class, $assessments[0]);

        $assessments = $client->getSpeciesAssessmentsById(22823, 'europe');
        $this->assertInternalType('array', $assessments);
        $this->assertInstanceOf(SpeciesAssessment::class, $assessments[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesAssessmentsById(0);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesAssessmentsById(0, 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesAssessmentsByName(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $assessments = $client->getSpeciesAssessmentsByName('Loxodonta Africana');
        $this->assertInternalType('array', $assessments);
        $this->assertInstanceOf(SpeciesAssessment::class, $assessments[0]);

        $assessments = $client->getSpeciesAssessmentsByName('Fratercula Arctica', 'europe');
        $this->assertInternalType('array', $assessments);
        $this->assertInstanceOf(SpeciesAssessment::class, $assessments[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesAssessmentsByName('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesAssessmentsByName('Carnivorous Vulgaris', 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesByCategory(): void
    {
        $client  = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');
        $species = $client->getSpeciesByCategory('VU');

        $this->assertInternalType('array', $species);
        $this->assertEquals('Abarema abbottii', $species[36563]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesByCategory('NO');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesById(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $species = $client->getSpeciesById(12392);
        $this->assertInstanceOf(Species::class, $species);

        $species = $client->getSpeciesById(22694927, 'europe');
        $this->assertInstanceOf(Species::class, $species);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesById(0);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesById(0, 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesByName(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $species = $client->getSpeciesByName('Loxodonta Africana');
        $this->assertInstanceOf(Species::class, $species);

        $species = $client->getSpeciesByName('Fratercula Arctica', 'europe');
        $this->assertInstanceOf(Species::class, $species);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesByName('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesByName('Carnivorous Vulgaris', 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesCitationById(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $citation = $client->getSpeciesCitationById(12392);
        $this->assertInternalType('string', $citation);
        $this->assertNotEmpty($citation);

        $citation = $client->getSpeciesCitationById(2467, 'europe');
        $this->assertInternalType('string', $citation);
        $this->assertNotEmpty($citation);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCitationById(0);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCitationById(0, 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesCitationByName(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $citation = $client->getSpeciesCitationByName('Loxodonta Africana');
        $this->assertInternalType('string', $citation);
        $this->assertNotEmpty($citation);

        $citation = $client->getSpeciesCitationByName('Balaena Mysticetus', 'europe');
        $this->assertInternalType('string', $citation);
        $this->assertNotEmpty($citation);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCitationByName('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCitationByName('Carnivorous Vulgaris', 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesCommonNames(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $commonNames = $client->getSpeciesCommonNames('Loxodonta Africana');
        $this->assertInternalType('array', $commonNames);
        $this->assertNotEmpty($commonNames[0]);

        $commonNames = $client->getSpeciesCommonNames('Loxodonta Africana', 'eng');
        $this->assertInternalType('array', $commonNames);
        $this->assertNotEmpty($commonNames[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCommonNames('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCommonNames('Accelerati Incredibilus', 'eng');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesNarrativeTextById(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $narrativeText = $client->getSpeciesNarrativeTextById(12392);
        $this->assertInstanceOf(SpeciesNarrativeText::class, $narrativeText);

        $narrativeText = $client->getSpeciesNarrativeTextById(2467, 'europe');
        $this->assertInstanceOf(SpeciesNarrativeText::class, $narrativeText);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesNarrativeTextById(0);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesNarrativeTextById(0, 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesNarrativeTextByName(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $narrativeText = $client->getSpeciesNarrativeTextByName('Loxodonta Africana');
        $this->assertInstanceOf(SpeciesNarrativeText::class, $narrativeText);

        $narrativeText = $client->getSpeciesNarrativeTextByName('Fratercula Arctica', 'europe');
        $this->assertInstanceOf(SpeciesNarrativeText::class, $narrativeText);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesNarrativeTextByName('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesNarrativeTextByName('Carnivorous Vulgaris', 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesOccurrenceById(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $occurrences = $client->getSpeciesOccurrenceById(12392);
        $this->assertInternalType('array', $occurrences);
        $this->assertInstanceOf(SpeciesOccurrence::class, $occurrences[0]);

        $occurrences = $client->getSpeciesOccurrenceById(22823, 'europe');
        $this->assertInternalType('array', $occurrences);
        $this->assertInstanceOf(SpeciesOccurrence::class, $occurrences[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesOccurrenceById(0);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesOccurrenceById(0, 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesOccurrenceByName(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $occurrences = $client->getSpeciesOccurrenceByName('Loxodonta Africana');
        $this->assertInternalType('array', $occurrences);
        $this->assertInstanceOf(SpeciesOccurrence::class, $occurrences[0]);

        $occurrences = $client->getSpeciesOccurrenceByName('Ursus Maritimus', 'europe');
        $this->assertInternalType('array', $occurrences);
        $this->assertInstanceOf(SpeciesOccurrence::class, $occurrences[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesOccurrenceByName('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesOccurrenceByName('Carnivorous Vulgaris', 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesSynonyms(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $synonyms = $client->getSpeciesSynonyms('Loxodonta Africana');
        $this->assertInternalType('array', $synonyms);

        $synonyms = $client->getSpeciesSynonyms('Felis Pardus');
        $this->assertInternalType('array', $synonyms);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesSynonyms('Accelerati Incredibilus');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesThreatsById(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $threats = $client->getSpeciesThreatsById(12392);
        $this->assertInternalType('array', $threats);
        $this->assertInstanceOf(Threat::class, $threats[0]);

        $threats = $client->getSpeciesThreatsById(2467, 'europe');
        $this->assertInternalType('array', $threats);
        $this->assertInstanceOf(Threat::class, $threats[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCitationByName(0);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesCitationByName(0, 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetSpeciesThreatsByName(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $threats = $client->getSpeciesThreatsByName('Loxodonta Africana');
        $this->assertInternalType('array', $threats);
        $this->assertInstanceOf(Threat::class, $threats[0]);

        $threats = $client->getSpeciesThreatsByName('Fratercula Arctica', 'europe');
        $this->assertInternalType('array', $threats);
        $this->assertInstanceOf(Threat::class, $threats[0]);

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesThreatsByName('Accelerati Incredibilus');

        $this->expectException(InvalidArgumentException::class);
        $client->getSpeciesThreatsByName('Carnivorous Vulgaris', 'europe');
    }

    /**
     * @throws IucnApiException
     */
    public function testGetVersion(): void
    {
        $client = new Client('9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

        $version = $client->getVersion();
        $this->assertInternalType('string', $version);
        $this->assertNotEmpty($version);
    }
}