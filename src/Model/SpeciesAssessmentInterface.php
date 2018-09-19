<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface SpeciesAssessmentInterface
 * @package KatTheWaffle\IucnApi\Model
 */
interface SpeciesAssessmentInterface
{
    /**
     * @return string
     */
    public function getCategory(): string;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return int
     */
    public function getYear(): int;
}