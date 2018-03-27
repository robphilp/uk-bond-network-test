<?php

namespace RobPhilp\Formatter;

use RobPhilp\Model\BatchInterface;

class JSONBatchFormatter implements BatchFormatterInterface
{
    /**
     * @var BatchInterface
     */
    private $batch;

    /**
     * @inheritdoc
     */
    public function setBatch(BatchInterface $batch)
    {
        $this->batch = $batch;
    }

    /**
     * @inheritdoc
     */
    public function getOutput(): string
    {
        $output = [];

        foreach($this->batch->getPackages() as $package) {
            $output[] = [
                'courier'               => $package->getCourier(),
                'consignment_number'    => $package->getConsignmentNumber(),
                'weight'                => (string)$package->getWeight(),
                'value'                 => (string)$package->getValue(),
            ];
        }

        return json_encode($output);
    }

}