<?php

use PHPUnit\Framework\TestCase;

use RobPhilp\Formatter\JSONBatchFormatter;
use RobPhilp\Model\DPDCourier;
use RobPhilp\Model\Batch;
use RobPhilp\Model\Package;
use RobPhilp\Model\ParcelForceCourier;
use RobPhilp\ValueObject\Money;
use RobPhilp\ValueObject\Weight;

class JSONBatchFormatterTest extends TestCase
{
    public function testValidJsonOutput()
    {
        $package1 = new Package(
            new Weight('20', 'KG'),
            new Money('25', '£'),
            new DPDCourier()
        );

        $package2 = new Package(
            new Weight('50', 'KG'),
            new Money('100', '£'),
            new ParcelForceCourier()
        );

        $batch = new Batch();
        $batch->addPackage($package1);
        $batch->addPackage($package2);

        $jsonFormatter = new JSONBatchFormatter();
        $jsonFormatter->setBatch($batch);

        $this->assertJson($jsonFormatter->getOutput());
    }

}