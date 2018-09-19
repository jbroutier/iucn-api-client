<?php

namespace KatTheWaffle\IucnApi;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use KatTheWaffle\IucnApi\Model\Species;
use KatTheWaffle\IucnApi\Model\SpeciesAssessment;
use KatTheWaffle\IucnApi\Model\SpeciesInterface;
use KatTheWaffle\IucnApi\Model\SpeciesNarrativeText;
use KatTheWaffle\IucnApi\Model\SpeciesNarrativeTextInterface;
use KatTheWaffle\IucnApi\Model\SpeciesOccurrence;
use KatTheWaffle\IucnApi\Model\Threat;
use KatTheWaffle\IucnApi\Exception\InvalidArgumentException;
use KatTheWaffle\IucnApi\Exception\InvalidTokenException;
use KatTheWaffle\IucnApi\Exception\IucnApiException;

/**
 * Class Client
 * @package KatTheWaffle\IucnApi
 */
class Client implements ClientInterface
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $token;

    /**
     * Client constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token      = $token;
        $this->httpClient = new HttpClient([
            'base_uri' => 'http://apiv3.iucnredlist.org',
        ]);
    }

    /**
     * @param string $endpoint
     * @return \stdClass
     * @throws IucnApiException
     */
    protected function request(string $endpoint): \stdClass
    {
        try {
            $response = $this->httpClient->request('GET', $endpoint);
        } catch (GuzzleException $exception) {
            throw new IucnApiException(sprintf('Request failed with the following error: %s',
                $exception->getMessage()
            ));
        }

        if ($response->getStatusCode() !== 200) {
            throw new IucnApiException(sprintf('Request failed with the following error: HTTP/%s %s %s.',
                $response->getProtocolVersion(), $response->getStatusCode(), $response->getReasonPhrase()
            ));
        }

        $data = json_decode($response->getBody(), false, 8);

        if (is_null($data)) {
            throw new IucnApiException(sprintf('Request failed with the following error: %s',
                json_last_error_msg()
            ));
        }

        if (property_exists($data, 'message')) {
            throw new InvalidTokenException('An invalid API token was provided.');
        }

        if (property_exists($data, 'error')) {
            throw new IucnApiException(sprintf('Request failed with the following error: %s',
                $data->error
            ));
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesAssessmentsById(int $id, string $region = null): array
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/history/id/%d?token=%s', $id, $this->token) :
            sprintf('/api/v3/species/history/id/%d/region/%s?token=%s', $id, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species id was provided.');
        }

        $assessments = [];

        foreach ($data->result as $result) {
            $assessments[] = SpeciesAssessment::createFromJson($result);
        }

        return $assessments;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesAssessmentsByName(string $name, string $region = null): array
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/history/name/%s?token=%s', rawurlencode($name), $this->token) :
            sprintf('/api/v3/species/history/name/%s/region/%s?token=%s', rawurlencode($name), $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        $assessments = [];

        foreach ($data->result as $result) {
            $assessments[] = SpeciesAssessment::createFromJson($result);
        }

        return $assessments;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesByCategory(string $category): array
    {
        $endpoint = sprintf('/api/v3/species/category/%s?token=%s', $category, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid category was provided.');
        }

        $species = [];

        foreach ($data->result as $result) {
            $species[$result->taxonid] = $result->scientific_name;
        }

        return $species;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesById(int $id, string $region = null): SpeciesInterface
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/id/%d?token=%s', $id, $this->token) :
            sprintf('/api/v3/species/id/%d/region/%s?token=%s', $id, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species id was provided.');
        }

        $species = Species::createFromJson($data->result[0]);

        return $species;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesByName(string $name, string $region = null): SpeciesInterface
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/%s?token=%s', rawurlencode($name), $this->token) :
            sprintf('/api/v3/species/%s/region/%s?token=%s', rawurlencode($name), $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        $species = Species::createFromJson($data->result[0]);

        return $species;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesCitationById(int $id, string $region = null): string
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/citation/id/%d?token=%s', $id, $this->token) :
            sprintf('/api/v3/species/citation/id/%d/region/%s?token=%s', $id, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species id was provided.');
        }

        return $data->result[0]->citation;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesCitationByName(string $name, string $region = null): string
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/citation/%s?token=%s', rawurlencode($name), $this->token) :
            sprintf('/api/v3/species/citation/%s/region/%s?token=%s', rawurlencode($name), $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        return $data->result[0]->citation;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesCommonNames(string $name, string $language = null): array
    {
        $endpoint = sprintf('/api/v3/species/common_names/%s?token=%s', rawurlencode($name), $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        $commonNames = [];

        foreach ($data->result as $result) {
            if (is_null($language) or $result->language === $language) {
                $commonNames[] = $result->taxonname;
            }
        }

        return $commonNames;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesCount(string $region = null): int
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/speciescount?token=%s', $this->token) :
            sprintf('/api/v3/speciescount/region/%s?token=%s', $region, $this->token);

        $data = $this->request($endpoint);

        return intval($data->count);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesNarrativeTextById(int $id, string $region = null): SpeciesNarrativeTextInterface
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/narrative/id/%d?token=%s', $id, $this->token) :
            sprintf('/api/v3/species/narrative/id/%d/region/%s?token=%s', $id, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species id was provided.');
        }

        return SpeciesNarrativeText::createFromJson($data->result[0]);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesNarrativeTextByName(string $name, string $region = null): SpeciesNarrativeTextInterface
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/narrative/%s?token=%s', rawurlencode($name), $this->token) :
            sprintf('/api/v3/species/narrative/%s/region/%s?token=%s', rawurlencode($name), $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        return SpeciesNarrativeText::createFromJson($data->result[0]);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesOccurrenceById(int $id, string $region = null): array
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/countries/id/%d?token=%s', $id, $this->token) :
            sprintf('/api/v3/species/countries/id/%d/region/%s?token=%s', $id, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species id was provided.');
        }

        $occurrences = [];

        foreach ($data->result as $result) {
            $occurrences[] = SpeciesOccurrence::createFromJson($result);
        }

        return $occurrences;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesOccurrenceByName(string $name, string $region = null): array
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/species/countries/name/%s?token=%s', rawurlencode($name), $this->token) :
            sprintf('/api/v3/species/countries/name/%s/region/%s?token=%s', rawurlencode($name), $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        $occurrences = [];

        foreach ($data->result as $result) {
            $occurrences[] = SpeciesOccurrence::createFromJson($result);
        }

        return $occurrences;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesSynonyms(string $name): array
    {
        $endpoint = sprintf('/api/v3/species/synonym/%s?token=%s', rawurlencode($name), $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        $synonyms = [];

        foreach ($data->result as $result) {
            $synonyms[] = (strtolower($name) === strtolower($result->synonym)) ?
                $result->accepted_name : $result->synonym;
        }

        return $synonyms;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesThreatsById(int $id, string $region = null): array
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/threats/species/id/%d?token=%s', $id, $this->token) :
            sprintf('/api/v3/threats/species/id/%d/region/%s?token=%s', $id, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species id was provided.');
        }

        $threats = [];

        foreach ($data->result as $result) {
            $threats[] = Threat::createFromJson($result);
        }

        return $threats;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpeciesThreatsByName(string $name, string $region = null): array
    {
        $endpoint = (is_null($region)) ?
            sprintf('/api/v3/threats/species/name/%s?token=%s', $name, $this->token) :
            sprintf('/api/v3/threats/species/name/%s/region/%s?token=%s', $name, $region, $this->token);

        $data = $this->request($endpoint);

        if (empty($data->result)) {
            throw new InvalidArgumentException('An invalid species name was provided.');
        }

        $threats = [];

        foreach ($data->result as $result) {
            $threats[] = Threat::createFromJson($result);
        }

        return $threats;
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): string
    {
        $data = $this->request('/api/v3/version');

        return $data->version;
    }
}