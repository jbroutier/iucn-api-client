<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface HabitatInterface
 * @package KatTheWaffle\IucnApi\Model
 * @see http://www.iucnredlist.org/technical-documents/classification-schemes/habitats-classification-scheme-ver3
 */
interface HabitatInterface
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return string
     */
    public function getMajorImportance(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getSeason(): string;

    /**
     * @return string
     */
    public function getSuitability(): string;
}