<?php

namespace KatTheWaffle\IucnApi\Traits;

use KatTheWaffle\IucnApi\Exception\IucnApiException;

/**
 * Trait CreateFromJsonTrait
 * @package KatTheWaffle\IucnApi\Traits
 */
trait CreateFromJsonTrait
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->$name;
    }

    /**
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param object $json
     * @return self
     * @throws IucnApiException
     */
    public static function createFromJson(object $json): self
    {
        $instance   = new self;
        $properties = get_class_vars(get_called_class());

        foreach ($properties as $name => $value) {
            $property = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));

            if (!property_exists($json, $property)) {
                throw new IucnApiException(sprintf('Missing property "%s" in JSON response.',
                    $property
                ));
            }

            $value = $json->$property;
            settype($value, gettype($instance->__get($name)));
            $instance->__set($name, $value);
        }

        return $instance;
    }
}