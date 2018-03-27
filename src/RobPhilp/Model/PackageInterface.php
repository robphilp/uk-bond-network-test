<?php

namespace RobPhilp\Model;

use RobPhilp\ValueObject\Money;
use RobPhilp\ValueObject\Weight;

interface PackageInterface
{
    /**
     * @return Weight
     */
    public function getWeight() : Weight;

    /**
     * @return Money
     */
    public function getValue() : Money;

    /**
     * @return string
     */
    public function getConsignmentNumber(): string;
}