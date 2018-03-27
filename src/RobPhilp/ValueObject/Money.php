<?php

namespace RobPhilp\ValueObject;

/**
 * Class Money
 *
 * VO to represent Money as a currency and a value
 *
 * @package RobPhilp\ValueObject
 */
class Money
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $currency;

    /**
     * Money constructor.
     *
     * @param string $value
     * @param string $currency
     */
    public function __construct(string $value, string $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
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
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s%s', $this->currency, $this->value);
    }
}
