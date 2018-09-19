<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class SpeciesOccurrence
 * @package KatTheWaffle\IucnApi\Model
 */
class SpeciesOccurrence implements SpeciesOccurrenceInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var string
     */
    protected $country = '';

    /**
     * @var string
     */
    protected $distributionCode = '';

    /**
     * @var string
     */
    protected $origin = '';

    /**
     * @var string
     */
    protected $presence = '';

    /**
     * {@inheritdoc}
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode(): string
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getDistributionCode(): string
    {
        return $this->distributionCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * {@inheritdoc}
     */
    public function getPresence(): string
    {
        return $this->presence;
    }
}