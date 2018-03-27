<?php

namespace RobPhilp\Model;

class ParcelForceCourier implements CourierInterface
{
    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'ParcelForce';
    }

    /**
     * @inheritdoc
     */
    public function generateConsignmentNumber(): string
    {
        // Just example concrete implementation - not great for real world usage!!
        return sprintf('%s-%d', 'ParcelForce', rand(10000, 99999));
    }

}