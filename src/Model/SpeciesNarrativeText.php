<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class SpeciesNarrativeText
 * @package KatTheWaffle\IucnApi\Model
 */
class SpeciesNarrativeText implements SpeciesNarrativeTextInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $conservationmeasures = '';

    /**
     * @var string
     */
    protected $geographicrange = '';

    /**
     * @var string
     */
    protected $habitat = '';

    /**
     * @var string
     */
    protected $population = '';

    /**
     * @var string
     */
    protected $populationtrend = '';

    /**
     * @var string
     */
    protected $rationale = '';

    /**
     * @var string
     */
    protected $taxonomicnotes = '';

    /**
     * @var string
     */
    protected $threats = '';

    /**
     * @var string
     */
    protected $usetrade = '';

    /**
     * {@inheritDoc}
     */
    public function getConservationMeasures(): string
    {
        return $this->conservationmeasures;
    }

    /**
     * {@inheritDoc}
     */
    public function getGeographicRange(): string
    {
        return $this->geographicrange;
    }

    /**
     * {@inheritDoc}
     */
    public function getHabitat(): string
    {
        return $this->habitat;
    }

    /**
     * {@inheritDoc}
     */
    public function getPopulation(): string
    {
        return $this->population;
    }

    /**
     * {@inheritDoc}
     */
    public function getPopulationTrend(): string
    {
        return $this->populationtrend;
    }

    /**
     * {@inheritDoc}
     */
    public function getRationale(): string
    {
        return $this->rationale;
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxonomicNotes(): string
    {
        return $this->taxonomicnotes;
    }

    /**
     * {@inheritDoc}
     */
    public function getThreats(): string
    {
        return $this->threats;
    }

    /**
     * {@inheritDoc}
     */
    public function getUseTrade(): string
    {
        return $this->usetrade;
    }
}