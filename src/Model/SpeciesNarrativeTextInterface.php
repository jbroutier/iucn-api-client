<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface SpeciesNarrativeTextInterface
 * @package KatTheWaffle\IucnApi\Model
 */
interface SpeciesNarrativeTextInterface
{
    /**
     * @return string
     */
    public function getConservationMeasures(): string;

    /**
     * @return string
     */
    public function getGeographicRange(): string;

    /**
     * @return string
     */
    public function getHabitat(): string;

    /**
     * @return string
     */
    public function getPopulation(): string;

    /**
     * @return string
     */
    public function getPopulationTrend(): string;

    /**
     * @return string
     */
    public function getRationale(): string;

    /**
     * @return string
     */
    public function getTaxonomicNotes(): string;

    /**
     * @return string
     */
    public function getThreats(): string;

    /**
     * @return string
     */
    public function getUseTrade(): string;
}