<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface SpeciesInterface
 * @package KatTheWaffle\IucnApi\Model
 */
interface SpeciesInterface
{
    /**
     * @return string
     */
    public function getAssessor(): string;

    /**
     * @return string
     */
    public function getAuthority(): string;

    /**
     * @return string
     */
    public function getCategory(): string;

    /**
     * @return string
     */
    public function getClass(): string;

    /**
     * @return string
     */
    public function getCriteria(): string;

    /**
     * @return string
     */
    public function getFamily(): string;

    /**
     * @return string
     */
    public function getGenus(): string;

    /**
     * @return string
     */
    public function getKingdom(): string;

    /**
     * @return string
     */
    public function getMainCommonName(): string;

    /**
     * @return string
     */
    public function getOrder(): string;

    /**
     * @return string
     */
    public function getPhylum(): string;

    /**
     * @return int
     */
    public function getPublishedYear(): int;

    /**
     * @return string
     */
    public function getReviewer(): string;

    /**
     * @return string
     */
    public function getScientificName(): string;

    /**
     * @return int
     */
    public function getTaxonId(): int;
}