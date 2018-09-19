<?php

namespace KatTheWaffle\IucnApi;

use KatTheWaffle\IucnApi\Exception\InvalidArgumentException;
use KatTheWaffle\IucnApi\Model\SpeciesAssessmentInterface;
use KatTheWaffle\IucnApi\Model\SpeciesInterface;
use KatTheWaffle\IucnApi\Model\SpeciesNarrativeTextInterface;
use KatTheWaffle\IucnApi\Model\SpeciesOccurrenceInterface;
use KatTheWaffle\IucnApi\Model\ThreatInterface;
use KatTheWaffle\IucnApi\Exception\IucnApiException;

/**
 * Interface ClientInterface
 * @package KatTheWaffle\IucnApi
 */
interface ClientInterface
{
    /**
     * Get a list of historical assessments for an individual species, by species ID.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-history-id
     *
     * @param int $id The species ID.
     * @param string|null $region An optional region identifier.
     * @return SpeciesAssessmentInterface[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species ID is provided.
     */
    public function getSpeciesAssessmentsById(int $id, string $region = null): array;

    /**
     * Get a list of historical assessments for an individual species, by species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-history-name
     *
     * @param string $name The species name.
     * @param string|null $region An optional region identifier.
     * @return SpeciesAssessmentInterface[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesAssessmentsByName(string $name, string $region = null): array;

    /**
     * Get a list of species by category.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-category
     *
     * @param string $category The category code.
     * @return string[] An array of species names, indexed by their taxon IDs.
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesByCategory(string $category): array;

    /**
     * Get species information for an individual species, by species ID.
     * http://apiv3.iucnredlist.org/api/v3/docs#species-individual-id
     *
     * @param int $id The species ID.
     * @param string|null $region An optional region identifier.
     * @return SpeciesInterface
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species ID is provided.
     */
    public function getSpeciesById(int $id, string $region = null): SpeciesInterface;

    /**
     * Get species information for an individual species, by species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-individual-name
     *
     * @param string $name The species name.
     * @param string|null $region An optional region identifier.
     * @return SpeciesInterface
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesByName(string $name, string $region = null): SpeciesInterface;

    /**
     * Get citation for an individual species, by species ID.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-citation-id
     *
     * @param int $id The species ID.
     * @param string|null $region An optional region identifier.
     * @return string
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species ID is provided.
     */
    public function getSpeciesCitationById(int $id, string $region = null): string;

    /**
     * Get citation for an individual species, by species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-citation-name
     *
     * @param string $name The species name.
     * @param string|null $region An optional region identifier.
     * @return string
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesCitationByName(string $name, string $region = null): string;

    /**
     * Get a list of common names for an indidual species, by species ID.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-common
     *
     * @param string $name The species name.
     * @param string|null $language An optional language filter.
     * @return string[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesCommonNames(string $name, string $language = null): array;

    /**
     * Get the total species count.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-count
     *
     * @param string|null $region An optional region identifier.
     * @return int
     * @throws IucnApiException if an error occurs during the execution of the request.
     */
    public function getSpeciesCount(string $region = null): int;

    /**
     * Get narrative information about an individual species, by species ID.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-narrative-id
     *
     * @param int $id The species ID.
     * @param string|null $region An optional region identifier.
     * @return SpeciesNarrativeTextInterface
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species ID is provided.
     */
    public function getSpeciesNarrativeTextById(int $id, string $region = null): SpeciesNarrativeTextInterface;

    /**
     * Get narrative information about an individual species, by species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-narrative-name
     *
     * @param string $name The species name.
     * @param string|null $region An optional region identifier.
     * @return SpeciesNarrativeTextInterface
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesNarrativeTextByName(string $name, string $region = null): SpeciesNarrativeTextInterface;

    /**
     * Get a list of countries of occurrence for an individual species, by species ID.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-occurrence-id
     *
     * @param int $id The species ID.
     * @param string|null $region An optional region identifier.
     * @return SpeciesOccurrenceInterface[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species ID is provided.
     */
    public function getSpeciesOccurrenceById(int $id, string $region = null): array;

    /**
     * Get a list of countries of occurrence for an individual species, by species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-occurrence-name
     *
     * @param string $name The species name.
     * @param string|null $region An optional region identifier.
     * @return SpeciesOccurrenceInterface[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesOccurrenceByName(string $name, string $region = null): array;

    /**
     * Get a list of synonyms for a given species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#species-synonym
     *
     * @param string $name The species name.
     * @return string[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesSynonyms(string $name): array;

    /**
     * Get a list of threats for an individual species, by species ID.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#threat-id
     *
     * @param int $id The species ID.
     * @param string|null $region An optional region identifier.
     * @return ThreatInterface[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species ID is provided.
     */
    public function getSpeciesThreatsById(int $id, string $region = null): array;

    /**
     * Get a list of threats for an individual species, by species name.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#threat-name
     *
     * @param string $name The species name.
     * @param string|null $region An optional region identifier.
     * @return ThreatInterface[]
     * @throws IucnApiException if an error occurs during the execution of the request.
     * @throws InvalidArgumentException if an invalid species name is provided.
     */
    public function getSpeciesThreatsByName(string $name, string $region = null): array;

    /**
     * Get the current Red List API version.
     * @see http://apiv3.iucnredlist.org/api/v3/docs#version
     *
     * @return string
     * @throws IucnApiException if an error occurs during the execution of the request.
     */
    public function getVersion(): string;
}