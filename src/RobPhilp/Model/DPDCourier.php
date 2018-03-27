<?php

namespace RobPhilp\Model;

class DPDCourier implements CourierInterface
{
    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'DPD';
    }

    /**
     * @inheritdoc
     */
    public function generateConsignmentNumber(): string
    {
        // Just example concrete implementation - not great for real world usage!!
        return sprintf('%s-%s', 'DPD', md5(time()));
    }

}