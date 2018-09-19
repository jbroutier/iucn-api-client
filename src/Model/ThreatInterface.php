<?php

namespace KatTheWaffle\IucnApi\Model;

/**
 * Interface ThreatInterface
 * @package KatTheWaffle\IucnApi\Model
 * @see http://www.iucnredlist.org/technical-documents/classification-schemes/threats-classification-scheme
 */
interface ThreatInterface
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return string
     */
    public function getInvasive(): string;

    /**
     * @return string
     */
    public function getSeverity(): string;

    /**
     * @return string
     */
    public function getScope(): string;

    /**
     * @return string
     */
    public function getScore(): string;

    /**
     * @return string
     */
    public function getTiming(): string;

    /**
     * @return string
     */
    public function getTitle(): string;
}