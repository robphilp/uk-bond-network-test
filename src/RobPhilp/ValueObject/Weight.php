<?php

namespace RobPhilp\ValueObject;

/**
 * Class Weight
 *
 * VO to represent weight with value and unit of weight
 *
 * @package RobPhilp\ValueObject
 */
class Weight {

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $unit;

    /**
     * Weight constructor.
     *
     * @param string $value
     * @param string $unit
     */
    public function __construct(string $value, string $unit)
    {
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s%s', $this->value, $this->unit);
    }


}