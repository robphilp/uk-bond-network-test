<?php

namespace RobPhilp\Model;

interface BatchInterface
{
    /**
     * @return \DateTimeImmutable
     */
    public function getOpenedTime() : \DateTimeImmutable;

    /**
     * @return \DateTimeImmutable
     */
    public function getClosedTime() : \DateTimeImmutable;

    /**
     * @param PackageInterface $package
     *
     * @return mixed
     */
    public function addPackage(PackageInterface $package);

    /**
     * @param string $number
     *
     * @return PackageInterface
     */
    public function getPackageByConsignmentNumber(string $number);

    /**
     * @param string $number
     *
     * @return void
     */
    public function removePackageByConsignmentNumber(string $number);

    /**
     * @return PackageInterface[]
     */
    public function getPackages(): array;
}