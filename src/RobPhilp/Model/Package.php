<?php

namespace RobPhilp\Model;

use RobPhilp\ValueObject\Money;
use RobPhilp\ValueObject\Weight;

class Package implements PackageInterface
{
    private $weight;
    private $value;
    private $courier;
    private $consignmentNumber;

    /**
     * Package constructor.
     *
     * @param Weight $weight
     * @param Money $value
     * @param CourierInterface $courier
     */
    public function __construct(Weight $weight, Money $value, CourierInterface $courier)
    {
        $this->weight = $weight;
        $this->value = $value;
        $this->setCourier($courier);
    }

    /**
     * @inheritdoc
     */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /**
     * @inheritdoc
     */
    public function getValue(): Money
    {
        return $this->value;
    }

    /**
     * @inheritdoc
     */
    public function setCourier(CourierInterface $courier)
    {
        $this->courier = $courier->getName();
        $this->consignmentNumber = $courier->generateConsignmentNumber();
    }

    /**
     * @inheritdoc
     */
    public function getCourier(): string
    {
        return $this->courier;
    }

    /**
     * @inheritdoc
     */
    public function getConsignmentNumber(): string
    {
        return $this->consignmentNumber;
    }

}