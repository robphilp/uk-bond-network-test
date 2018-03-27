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
     * @param CourierInterface $courier
     *
     * @return void
     */
    public function setCourier(CourierInterface $courier);

    /**
     * @return string
     */
    public function getCourier(): string;

    /**
     * @return string
     */
    public function getConsignmentNumber(): string;
}