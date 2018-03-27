<?php

use PHPUnit\Framework\TestCase;

use RobPhilp\Model\DPDCourier;
use RobPhilp\Model\Package;
use RobPhilp\Model\PackageInterface;
use RobPhilp\ValueObject\Money;
use RobPhilp\ValueObject\Weight;

class PackageTest extends TestCase
{
    /**
     * @var PackageInterface
     */
    private $package;

    public function setUp()
    {
        $this->package = new Package(
            new Weight('20', 'KG'),
            new Money('25', '£'),
            new DPDCourier()
        );
    }

    public function testCanInstantiatePackage()
    {
        $this->assertInstanceOf(Package::class, $this->package);
    }

    public function testWeightCorrectlySet()
    {
        $this->assertEquals(
            new Weight('20', 'KG'),
            $this->package->getWeight()
        );
    }

    public function testValueCorrectlySet()
    {
        $this->assertEquals(
            new Money('25', '£'),
            $this->package->getValue()
        );
    }

    public function testCourierCorrectlySet()
    {
        $this->assertEquals('DPD', $this->package->getCourier());
    }

    public function testCanChangeCourier()
    {
        $package = new Package(
            new Weight('100', 'KG'),
            new Money('100', '£'),
            new DPDCourier()
        );

        $this->assertEquals('DPD', $package->getCourier());
        $consignmentNumberBefore = $package->getConsignmentNumber();

        $package->setCourier(new \RobPhilp\Model\ParcelForceCourier());
        $this->assertEquals('ParcelForce', $package->getCourier());
        $this->assertNotEquals($consignmentNumberBefore, $package->getConsignmentNumber());
    }

}