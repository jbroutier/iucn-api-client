<?php

namespace KatTheWaffle\IucnApi\Model;

use KatTheWaffle\IucnApi\Traits\CreateFromJsonTrait;

/**
 * Class ConservationMeasure
 * @package KatTheWaffle\IucnApi\Model
 */
class ConservationMeasure implements ConservationMeasureInterface
{
    use CreateFromJsonTrait;

    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}