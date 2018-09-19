<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface SpeciesOccurrenceInterface
 * @package KatTheWaffle\IucnApi\Model
 */
interface SpeciesOccurrenceInterface
{
    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * @return string
     */
    public function getDistributionCode(): string;

    /**
     * @return string
     */
    public function getOrigin(): string;

    /**
     * @return string
     */
    public function getPresence(): string;
}