<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class Habitat
 * @package KatTheWaffle\IucnApi
 */
class Habitat implements HabitatInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var string
     */
    protected $majorImportance = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $season = '';

    /**
     * @var string
     */
    protected $suitability = '';

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
    public function getMajorImportance(): string
    {
        return $this->majorImportance;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeason(): string
    {
        return $this->season;
    }

    /**
     * {@inheritdoc}
     */
    public function getSuitability(): string
    {
        return $this->suitability;
    }
}