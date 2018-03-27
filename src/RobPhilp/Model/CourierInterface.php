<?php

namespace RobPhilp\Model;

interface CourierInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function generateConsignmentNumber(): string;
}