<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class SpeciesAssessment
 * @package KatTheWaffle\IucnApi\Model
 */
class SpeciesAssessment implements SpeciesAssessmentInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $category = '';

    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var int
     */
    protected $year = 0;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getYear(): int
    {
        return $this->year;
    }
}