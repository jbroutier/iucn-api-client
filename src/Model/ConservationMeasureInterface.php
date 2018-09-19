<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface ConservationMeasureInterface
 * @package KatTheWaffle\IucnApi\Model
 * @see http://www.iucnredlist.org/technical-documents/classification-schemes/conservation-actions-classification-scheme-ver2
 */
interface ConservationMeasureInterface
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return string
     */
    public function getName(): string;
}