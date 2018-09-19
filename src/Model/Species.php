<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class Species
 * @package KatTheWaffle\IucnApi\Model
 */
class Species implements SpeciesInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $assessor = '';

    /**
     * @var string
     */
    protected $authority = '';

    /**
     * @var string
     */
    protected $category = '';

    /**
     * @var string
     */
    protected $class = '';

    /**
     * @var string
     */
    protected $criteria = '';

    /**
     * @var string
     */
    protected $family = '';

    /**
     * @var string
     */
    protected $genus = '';

    /**
     * @var string
     */
    protected $kingdom = '';

    /**
     * @var string
     */
    protected $mainCommonName = '';

    /**
     * @var string
     */
    protected $order = '';

    /**
     * @var string
     */
    protected $phylum = '';

    /**
     * @var int
     */
    protected $publishedYear = 0;

    /**
     * @var string
     */
    protected $reviewer = '';

    /**
     * @var string
     */
    protected $scientificName = '';

    /**
     * @var int
     */
    protected $taxonid = 0;

    /**
     * {@inheritdoc}
     */
    public function getAssessor(): string
    {
        return $this->assessor;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthority(): string
    {
        return $this->authority;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * {@inheritdoc}
     */
    public function getCriteria(): string
    {
        return $this->criteria;
    }

    /**
     * {@inheritdoc}
     */
    public function getFamily(): string
    {
        return $this->family;
    }

    /**
     * {@inheritdoc}
     */
    public function getGenus(): string
    {
        return $this->genus;
    }

    /**
     * {@inheritdoc}
     */
    public function getKingdom(): string
    {
        return $this->kingdom;
    }

    /**
     * {@inheritdoc}
     */
    public function getMainCommonName(): string
    {
        return $this->mainCommonName;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * {@inheritdoc}
     */
    public function getPhylum(): string
    {
        return $this->phylum;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishedYear(): int
    {
        return $this->publishedYear;
    }

    /**
     * {@inheritdoc}
     */
    public function getReviewer(): string
    {
        return $this->reviewer;
    }

    /**
     * {@inheritdoc}
     */
    public function getScientificName(): string
    {
        return $this->scientificName;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxonId(): int
    {
        return $this->taxonid;
    }
}