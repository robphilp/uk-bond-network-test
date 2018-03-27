<?php

use PHPUnit\Framework\TestCase;

use RobPhilp\Model\DPDCourier;
use RobPhilp\Model\Batch;
use RobPhilp\Model\Package;
use RobPhilp\Model\ParcelForceCourier;
use RobPhilp\ValueObject\Money;
use RobPhilp\ValueObject\Weight;

class BatchTest extends TestCase
{
    public function testCanInstantiateBatch()
    {
        $this->assertInstanceOf(Batch::class, new Batch());
    }

    public function testCanAddPackagesCorrectly()
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
        $this->assertCount(0, $batch->getPackages());

        $batch->addPackage($package1);
        $batch->addPackage($package2);

        $this->assertCount(2, $batch->getPackages());
    }

    public function testCanGetPackageByConsignmentNumber()
    {
        $package1 = new Package(
            new Weight('20', 'KG'),
            new Money('25', '£'),
            new DPDCourier()
        );

        $number = $package1->getConsignmentNumber();

        $batch = new Batch();
        $batch->addPackage($package1);

        $found_package = $batch->getPackageByConsignmentNumber($number);

        $this->assertSame($package1, $found_package);
    }

    public function testCanRemovePackageByConsignmentNumber()
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

        $number = $package1->getConsignmentNumber();

        $batch = new Batch();
        $batch->addPackage($package1);
        $batch->addPackage($package2);

        $this->assertCount(2, $batch->getPackages());

        $batch->removePackageByConsignmentNumber($number);

        $this->assertCount(1, $batch->getPackages());

        $this->assertNull($batch->getPackageByConsignmentNumber($number));
    }

}