<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class Threat
 * @package KatTheWaffle\IucnApi\Model
 */
class Threat implements ThreatInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var string
     */
    protected $invasive = '';

    /**
     * @var string
     */
    protected $scope = '';

    /**
     * @var string
     */
    protected $score = '';

    /**
     * @var string
     */
    protected $severity = '';

    /**
     * @var string
     */
    protected $timing = '';

    /**
     * @var string
     */
    protected $title = '';

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
    public function getInvasive(): string
    {
        return $this->invasive;
    }

    /**
     * {@inheritdoc}
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * {@inheritdoc}
     */
    public function getScore(): string
    {
        return $this->score;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeverity(): string
    {
        return $this->severity;
    }

    /**
     * {@inheritdoc}
     */
    public function getTiming(): string
    {
        return $this->timing;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}