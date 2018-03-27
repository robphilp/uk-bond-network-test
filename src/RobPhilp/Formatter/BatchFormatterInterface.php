<?php

namespace RobPhilp\Formatter;

use RobPhilp\Model\BatchInterface;

interface BatchFormatterInterface
{
    /**
     * @param BatchInterface $batch
     *
     * @return void
     */
    public function setBatch(BatchInterface $batch);

    /**
     * @return string
     */
    public function getOutput(): string;
}